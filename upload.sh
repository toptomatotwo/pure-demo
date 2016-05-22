#!/usr/bin/env bash

if [[ $1 == --boo ]] ; then
    rsync -avP inc screenshot.png templates *.php *.css elenaboo:public_html/wp/wp-content/themes/pure-demolition
elif [[ $1 == --ill ]] ; then
		rsync -avP inc screenshot.png templates *.php *.css bhujanga:public_html/wp/wp-content/themes/pure-coils
else
    echo Enter --boo or --ill
fi


