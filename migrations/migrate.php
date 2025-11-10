<?php
require_once __DIR__ . '/create_database.php';
require_once __DIR__ . '/create_users_table.php';
require_once __DIR__ . '/create_transactions_table.php';

create_database();
create_users_table();
create_transactions_table();

echo "All migrations completed successfully!\n";
