while :; do
    read texto;
    #Add a delay
    if [ $texto  = 1 ]; then
        sudo mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO sensors (`sensors-stage`) VALUES ('1')' feria-db;
        echo "fffffffff";
        sleep 4;
    fi
    if [ $texto  = 2 ]; then
        sudo mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO sensors (`sensors-stage`) VALUES ('2')' feria-db;
        echo "fffffffff";
        sleep 4;
    fi
    if [ $texto  = 3 ]; then
        sudo mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -e 'INSERT INTO sensors (`sensors-stage`) VALUES ('3')' feria-db;
        echo "fffffffff";
        sleep 4;
    fi
done
