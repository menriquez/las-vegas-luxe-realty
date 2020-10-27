#!/bin/bash

list="/home/admin/web/lasvegasluxerealty.com/public_html/rets"
config="/usr/bin/php"

# shellcheck disable=SC2066
for i in "$list"
do
    "$config" "$i"/rets_update.php
done

