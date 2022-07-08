#!/bin/bash
set -e
exec /usr/sbin/apache2ctl  -D FOREGROUND "$@"

