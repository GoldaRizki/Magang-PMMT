@extends('layouts.header')

@section('isi')
    
    <div class="container">
    <table id="tabelTemplate" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <td></td>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Extn.</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
                <td>5421</td>
                <td>t.nixon@datatables.net</td>
            </tr>
           
        </tbody>
    </table>

</div>

@endsection