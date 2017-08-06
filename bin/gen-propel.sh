#!/bin/sh

vendor/bin/propel database:reverse --config-dir="models/config" --output-dir="models/generated-reversed-database" --schema-name="fftracker_db.schema" fftracker_db
vendor/bin/propel database:reverse --config-dir="models/config" --output-dir="models/generated-reversed-database" --schema-name="fftracker_auth.schema" fftracker_auth


vendor/bin/propel model:build --config-dir="models/config" --schema-dir="models/generated-reversed-database" --output-dir="models/classes"
vendor/bin/propel sql:build --config-dir="models/config" --output-dir="models/generated-sql" --schema-dir="models/generated-reversed-database"

php composer.phar dump-autoload