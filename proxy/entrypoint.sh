#!/bin/bash
certbot-auto --nginx -d dlgate-jp.cyou -d www.example.com -m kumamann4@gmail.com --agree-tos -n
certbot-auto renew
/bin/bash