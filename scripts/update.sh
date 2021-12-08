git stage -A && git commit -m "$(date '+%d/%m/%Y %H:%M:%S')" ; git push ; \
ssh root@45.63.115.9 "cd /var/www/html && git pull"