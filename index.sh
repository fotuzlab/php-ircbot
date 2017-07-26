#!/usr/bin/env bash

# Activate/Destroy all the bots at once.

if [ "$1" = "all" ]
then
    for DIR in $(find bots/ -maxdepth 1 -type d); do
		BOT="$(basename $DIR)"
		if [ "$BOT" = "bots" ]; then
			continue
		fi
		screen -mdS $BOT php index.php $BOT
		MESSAGE="All the bots listed below are activated."
	done;
elif [ "$1" = "destroy" ]
then
    killall screen; # This kills all the screens. Change it to kill
                    # for each bot. Else unwanted screens will be killed too.
    MESSAGE="All bots destroyed."
else
	screen -mdS $1 php index.php $1
	MESSAGE="If the bot name is appearing in the list below, 
		it is activated."
fi
echo "/////////////////////PHP IRC BOT/////////////////////"
echo $MESSAGE
screen -r
echo "/////////////////////PHP IRC BOT/////////////////////"

# @TODO: Allow selective multiple bot activation.