<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive DataTable with Expandable Rows</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/fh-3.4.0/r-2.5.0/datatables.min.css" rel="stylesheet">
 
  
</head>
<body>

    <h1>Responsive DataTable with Expandable Rows</h1>

        <table id="example" class="table table- w-100 nowrap table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>dwaawd</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>wadjfjawdgkgawfjhawfigakfhwaigiafgs</td>
                </tr>
                <!-- Add more data rows as needed -->
            </tbody>
        </table>

<!-- Bootstrap JS and Popper.js -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/fh-3.4.0/r-2.5.0/datatables.min.js"></script>
    
<script>
   $(document).ready(
    function() {
        $("example").DataTable({
            responsive:true
        });
   }
   );
</script>

</body>
</html>
