#!/bin/bash
echo "Welcome to the dispenser control program."
echo "Write 1 for Raspberry or 2 for terminal-only tests:"
read mode

if [ $mode = 1 ]; then
    #Establecer pines GPIO como emisores (salida).
    gpio mode 4 out #Electroiman del dispensador

    while :; do
        rewarded=0
        userid=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `id-user` FROM users ORDER BY `id-user` DESC LIMIT 1' feria-db)
        userage=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `user-age` FROM users ORDER BY `id-user` DESC LIMIT 1' feria-db)
        echo "Last user is $userid"
        echo "Age: $userage"
        lastuserid=$userid

        while [ $userid -eq $lastuserid ]; do
            if [ $userage -lt 15 ]; then
                score=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `ranking-score` FROM rankingmenores WHERE `id-user` = '$userid'' feria-db)
            elif [ $userage -ge 15 ]; then
                score=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `ranking-score` FROM rankingmayores WHERE `id-user` = '$userid'' feria-db)
            fi
            if [ -n "$score" ] && [ $score -ge 800 ] && [ $rewarded -eq 0 ]; then
                gpio write 4 1
                sleep 4
                gpio write 4 0
                echo "User $userid rewarded"
                echo "User score is $score"
                rewarded=1
                #echo $ > ./raspberry-daemon.pid; #Registro del Process ID, para finalizarlo.
            fi
            sleep 10
            userid=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `id-user` FROM users ORDER BY `id-user` DESC LIMIT 1' feria-db)
        done
    sleep 4
    done
fi

if [ $mode = 2 ]; then
    echo "Enter the host ip: "
    read ip

    while :; do
        rewarded=0
        userid=$(mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -se 'SELECT `id-user` FROM users ORDER BY `id-user` DESC LIMIT 1' feria-db)
        userage=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `user-age` FROM users ORDER BY `id-user` DESC LIMIT 1' feria-db)
        echo "Last user is $userid"
        echo "Age: $userage"
        lastuserid=$userid

        while [ $userid -eq $lastuserid ]; do
            if [ $userage -lt 15 ]; then
                score=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `ranking-score` FROM rankingmenores WHERE `id-user` = '$userid'' feria-db)
            elif [ $userage -ge 15 ]; then
                score=$(mysql -h 10.0.1.40 -u raspberry -p'-r4spb3rry-' -se 'SELECT `ranking-score` FROM rankingmayores WHERE `id-user` = '$userid'' feria-db)
            fi
            if [ -n "$score" ] && [ $score -ge 800 ] && [ $rewarded -eq 0 ]; then
                echo "User $userid rewarded"
                echo "User score is $score"
                rewarded=1
                #echo $ > ./raspberry-daemon.pid; #Registro del Process ID, para finalizarlo.
            fi
            sleep 10
            userid=$(mysql -h "$ip" -u raspberry -p'-r4spb3rry-' -se 'SELECT `id-user` FROM users ORDER BY `id-user` DESC LIMIT 1' feria-db)
        done
    sleep 4
    echo "User has changed"
    done
fi