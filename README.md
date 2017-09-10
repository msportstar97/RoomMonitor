# RoomMonitor
2017 Summer IoT Project in POSTECH Distributed Processing & Network Management Laboratory with Professor James Won-Ki HONG

Goal: A website used to store room data (temperature, number of people) in POSTECH from the Artik Cloud database.

Original Plan:
To use the Artik 053 and connect IR sensors and temperature/humidity sensors to it in order to record data of classrooms. 
The Artik Cloud stores the real-time data from the sensors. The data is then put into a localhost website created by a Wamp64 server
by using the REST API. The Artik Cloud and the Artik 053 should be connected wirelessly through the Artik's own wifi. 

End Result:
An Arduino is used instead of the Artik 053 to connect to the sensors. 
A terminal application called CoolTerm is used to gather the real-time data of the classrooms and store them into the localhost website.
Instead of a wireless connection, the Arduino is wired to the computer hosting the website in order for the data to record. 

Full Report:
https://drive.google.com/open?id=0B3wztTnmxq_HTlRLUzkyZnhYTW8 
