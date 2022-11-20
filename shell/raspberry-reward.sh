#!/bin/bash
echo "Bienvenido al programa de control del dispenser."
echo "Escriba 1 para Raspberry o 2 para pruebas de solo terminal: "
read mode

if [ $mode = 1 ]; then
    #Establecer pines GPIO como emisores (salida).
    gpio mode 4 out #Electroiman del dispensador

    while :; do
        rewarded=0
        userid=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `id-user` FROM journey ORDER BY `id-user` DESC LIMIT 1' feria-db)
        userage=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `user-age` FROM users WHERE `id-user` = '$userid'' feria-db)
        echo "El último usuario es $userid"
        echo "Edad: $userage"
        lastuserid=$userid

        while [ $userid -eq $lastuserid ]; do
            userstep=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `journey-step` FROM journey WHERE `id-user` = '$userid'' feria-db)
            if [ $userstep -eq 9 ]; then
                if [ $userage -lt 15 ]; then
                    score=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `ranking-score` FROM rankingmenores WHERE `id-user` = '$userid'' feria-db)
                elif [ $userage -ge 15 ]; then
                    score=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `ranking-score` FROM rankingmayores WHERE `id-user` = '$userid'' feria-db)
                fi
                if [ -n "$score" ] && [ $score -ge 900 ] && [ $rewarded -eq 0 ]; then
                    gpio write 4 1
                    sleep 4
                    gpio write 4 0
                    echo "Usuario $userid recompensado"
                    echo "La puntuación del usuario es $score"
                    rewarded=1
                    #echo $ > ./raspberry-daemon.pid; #Registro del Process ID, para finalizarlo.
                fi
                gpio write 3 0
                gpio write 22 0
                gpio write 24 0
		        echo "Las luces se apagan"
            fi
            sleep 10
            userid=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `id-user` FROM journey ORDER BY `id-user` DESC LIMIT 1' feria-db)
        done
    sleep 4
    echo "El usuario ha cambiado"
    done
fi

if [ $mode = 2 ]; then
    echo "Ingrese la dirección IP del host: "
    read ip

    while :; do
        rewarded=0
        userid=$(mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -se 'SELECT `id-user` FROM journey ORDER BY `id-user` DESC LIMIT 1' feria-db)
        userage=$(mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -se 'SELECT `user-age` FROM users WHERE `id-user` = '$userid'' feria-db)
        echo "El último usuario es $userid"
        echo "Edad: $userage"
        lastuserid=$userid

        while [ $userid -eq $lastuserid ]; do
            userstep=$(mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -se 'SELECT `journey-step` FROM journey WHERE `id-user` = '$userid'' feria-db)
            if [ $userstep -eq 9 ]; then
                if [ $userage -lt 15 ]; then
                    score=$(mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -se 'SELECT `ranking-score` FROM rankingmenores WHERE `id-user` = '$userid'' feria-db)
                elif [ $userage -ge 15 ]; then
                    score=$(mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -se 'SELECT `ranking-score` FROM rankingmayores WHERE `id-user` = '$userid'' feria-db)
                fi
                if [ -n "$score" ] && [ $score -ge 800 ] && [ $rewarded -eq 0 ]; then
                    echo "Usuario $userid recompensado"
                    echo "La puntuación del usuario es $score"
                    rewarded=1
                    #echo $ > ./raspberry-daemon.pid; #Registro del Process ID, para finalizarlo.
                fi
                echo "Las luces se apagan"
            fi
            sleep 10
            userid=$(mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -se 'SELECT `id-user` FROM journey ORDER BY `id-user` DESC LIMIT 1' feria-db)
        done
    sleep 4
    echo "El usuario ha cambiado"
    done
fi
