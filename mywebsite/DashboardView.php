<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Contact Messages</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Dashboard - Mesazhet nga Kontakti</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Email</th>
                <th>Subjekti</th>
                <th>Mesazhi</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($contacts)): ?>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?php echo $contact['id']; ?></td>
                        <td><?php echo htmlspecialchars($contact['name']); ?></td>
                        <td><?php echo htmlspecialchars($contact['email']); ?></td>
                        <td><?php echo htmlspecialchars($contact['subject']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($contact['message'])); ?></td>
                        <td><?php echo $contact['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No contact messages found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>