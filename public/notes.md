--DISPLAY SIZES
    -- PHONES<= 640px   
    -- TABLET<=768px   
    -- DSKTOP<=1024px;

---------------------------------------------------------------------------------------------------------------
-- Connecting to a Database:
        new PDO(): Creates a new PDO object for database connection.
        Example: $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydatabase', 'username', 'password');
        
-- Preparing and Executing Queries:
        prepare(): Prepares an SQL statement for execution.
        execute(): Executes a prepared statement.
        $statement = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $statement->execute([$id]);

-- Fetching Data:s
        fetch(): Fetches the next row from a result set.
        fetchAll(): Fetches all rows from a result set.
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

-- Binding Parameters:
        bindParam(): Binds a parameter to a named or question mark placeholder in the SQL statement.
        bindValue(): Binds a value to a named or question mark placeholder in the SQL statement.
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(1, $id, PDO::PARAM_INT);

-- Transaction Handling:
        beginTransaction(): Starts a transaction.
        commit(): Commits the transaction.
        rollback(): Rolls back the transaction.
        $pdo->beginTransaction();
        // Execute SQL queries...
        $pdo->commit();

-- Error Handling:
        errorInfo(): Retrieves error information associated with the last operation on the statement handle.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
           // Perform database operation...
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

-- Closing Connection:
        close(): Closes the connection to the database.
        $pdo = null;