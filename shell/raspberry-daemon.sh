#Inicializar varaiables.
lastsensor=0;

#echo $! > ./raspberry-daemon.pid; #Registro del Process ID, para finalizarlo.
#sudo mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -e 'SELECT * FROM signals ORDER BY `id-record` DESC LIMIT 1' feria-db;
echo "Welcome to the input-output control program.";

echo "Write 1 for Raspberry or 2 for terminal-only tests:";
read mode;

if [ $mode = 1]; then
    #Establecer pines GPIO como receptores (escucha).
    gpio mode 2 in; #Sensor/Interruptor etapa 1
    gpio mode 21 in; #Sensor/Interruptor etapa 2
    gpio mode 23 in; #Sensor/Interruptor etapa 3

    #Establecer pines GPIO como emisores (salida).
    gpio mode 3 out; #LED etapa 1
    gpio mode 22 out; #LED etapa 2
    gpio mode 24 out; #LED etapa 3

    while :; do
        if [ "$(gpio read 2)" -eq 0 ] && [ "$lastsensor" -ne 1 ]; then
            sudo mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO signals (`signal-stage`) VALUES ('1')' feria-db;
            lastsensor=1;
            echo "Llegada a etapa 1 registrada";
            gpio write 3 1;
            sleep 10;
            gpio write 3 0;
        fi
        if [ "$(gpio read 21)" -eq 0 ] && [ "$lastsensor" -ne 2 ]; then
            sudo mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO signals (`signal-stage`) VALUES ('2')' feria-db;
            lastsensor=2;
            echo "Llegada a etapa 2 registrada";
            gpio write 22 1;
            sleep 10;
            gpio write 22 0;
        fi
        if [ "$(gpio read 23)" -eq 0 ] && [ "$lastsensor" -ne 3 ]; then
            sudo mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO signals (`signal-stage`) VALUES ('3')' feria-db;
            lastsensor=3;
            echo "Llegada a etapa 3 registrada";
            gpio write 24 1;
            sleep 10;
            gpio write 24 0;
        fi
    done
fi

if [ $mode = 2 ]; then

    echo "Enter the host ip: ";
    read ip;

    while :; do
        read signal;
        if [ "$signal" -eq 1 ] && [ "$lastsensor" -ne 1 ]; then
            sudo mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO signals (`signal-stage`) VALUES ('1')' feria-db;
            lastsensor=1;
            echo "Llegada a etapa 1 registrada";
            sleep 10;
        fi
        if [ "$signal" -eq 2 ] && [ "$lastsensor" -ne 2 ]; then
            sudo mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO signals (`signal-stage`) VALUES ('2')' feria-db;
            lastsensor=2;
            echo "Llegada a etapa 2 registrada";
            sleep 10;
        fi
        if [ "$signal" -eq 3 ] && [ "$lastsensor" -ne 3 ]; then
            sudo mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO signals (`signal-stage`) VALUES ('3')' feria-db;
            lastsensor=3;
            echo "Llegada a etapa 3 registrada";
            sleep 10;
        fi
    done
fi