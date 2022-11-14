#!/bin/bash

#Ensure VITA is updated (this is where we have the pubs list)
echo "Updating bib file in VITA"
cd ~/Documents/VITA/
git pull

#Now cd back here and push
echo "Copying local file to current directory"
cd ~/CODE/albertgatt.github.io
cp ~/Documents/VITA/agatt.bib assets/inc/agatt.bib
echo "Pushing to website"
git add assets/inc/agatt.bib
git commit -m 'Update bib file'
git push


