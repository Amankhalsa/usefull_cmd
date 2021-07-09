# usefull Django _cmd
* <a href="https://github.com/Amankhalsa/usefull_cmd/blob/main/Clean_Django%20CMDs.txt">ORDER TO INSTALL DJANGO WIN7</a>

* <a href="https://www.c-sharpcorner.com/article/how-to-install-pip-django-virtualenv-in-ubuntu/">for ubuntu</a>

* <a href="https://copyassignment.com/python/"> PYTHON copyassignment.comt</a>


# Wifi pasword finder 
  *  It’s pretty but u can do this in CMD.
  *  There are steps:
  *  1) Open CMD as administrator
  *  2) Type “netsh wlan show profiles” that’ll show all wifi that u were connected
  *  3) Type “netsh wlan show profile [name of wifi] key=clear”
  *  4) It’ll show u password in Key content
  *  That’s all
# Using python code 

 # first we will import the subprocess module
import subprocess

# now we will store the profiles data in "data" variable by 
# running the 1st cmd command using subprocess.check_output
data = subprocess.check_output(['netsh', 'wlan', 'show', 'profiles']).decode('utf-8').split('\n')

# now we will store the profile by converting them to list
profiles = [i.split(":")[1][1:-1] for i in data if "All User Profile" in i]

# using for loop in python we are checking and printing the wifi 
# passwords if they are available using the 2nd cmd command
for i in profiles:

    # running the 2nd cmd command to check passwords
    results = subprocess.check_output(['netsh', 'wlan', 'show', 'profile', i, 
                        'key=clear']).decode('utf-8').split('\n')
    # storing passwords after converting them to list
    results = [b.split(":")[1][1:-1] for b in results if "Key Content" in b]
    # printing the profiles(wifi name) with their passwords using 
    # try and except method 
    try:
        print ("{:<30}|  {:<}".format(i, results[0]))
    except IndexError:
        print ("{:<30}|  {:<}".format(i, ""))

#         netsh wlan show profile
# netsh wlan show profile PROFILE-NAME key=clear
