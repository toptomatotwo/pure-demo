#!/usr/bin/env bash

if [[ $1 == --boo ]] ; then
    rsync -avP dist lib screenshot.png templates *.php *.css elenaboo:public_html/wp/wp-content/themes/pure-demolition
elif [[ $1 == --ill ]] ; then
		rsync -avP dist lib screenshot.png templates *.php *.css bhujanga:public_html/wp/wp-content/themes/pure-coils
elif [[ $1 == --my ]] ; then
		rsync -avP dist lib screenshot.png templates *.php *.css my:public_html/wprs/wp-content/themes/pure-yoga
else
    echo Enter --boo or --ill or --my
fi
