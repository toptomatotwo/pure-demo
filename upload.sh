#!/usr/bin/env bash

if [[ $1 == --boo ]] ; then
    rsync -avP dist lib screenshot.png templates *.php *.css elenaboo:public_html/wp/wp-content/themes/pure-demolition
elif [[ $1 == --ill ]] ; then
		rsync -avP dist lib screenshot.png templates *.php *.css bhujanga:public_html/wp/wp-content/themes/pure-coils
elif [[ $1 == --my ]] ; then
		rsync -avP dist lib screenshot.png templates *.php *.css my:public_html/wprs/wp-content/themes/pure-yoga
elif [[ $1 == --mh ]] ; then
		rsync -avP dist lib screenshot.png templates *.php *.css madhappy:public_html/LIVE/wp-content/themes/pure-madness
elif [[ $1 == --all ]] ; then
    rsync -avP dist lib screenshot.png templates *.php *.css elenaboo:public_html/wp/wp-content/themes/pure-demolition
		rsync -avP dist lib screenshot.png templates *.php *.css bhujanga:public_html/wp/wp-content/themes/pure-coils
		rsync -avP dist lib screenshot.png templates *.php *.css my:public_html/wprs/wp-content/themes/pure-yoga
		rsync -avP dist lib screenshot.png templates *.php *.css madhappy:public_html/LIVE/wp-content/themes/pure-madness
else
    echo Enter --boo --ill --mh --my or --all
fi
