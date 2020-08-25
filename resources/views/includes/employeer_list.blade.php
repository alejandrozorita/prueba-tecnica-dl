<div class="row">
  <table class="table">
    <thead>
    <tr>
      <th scope="col">Num Employer</th>
      <th scope="col">Birth Date</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Hire Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employer)
      <tr onclick="getEmployer({{$employer->emp_no}})">
        <th scope="row">{{$employer->emp_no}}</th>
        <td>{{$employer->getCustomData('birth_date')}}</td>
        <td>{{$employer->first_name}}</td>
        <td>{{$employer->last_name}}</td>
        <td>{{$employer->getGender()}}</td>
        <td>{{$employer->getCustomData('hire_date')}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $employees->appends($data)->links() }}
</div>