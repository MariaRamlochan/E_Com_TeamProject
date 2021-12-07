<html>
<head><title>Search Results</title></head><body>

This is the search results page
<br>

<br>
<table>
	<tr><th>First Name</th><th>Last Name</th><th>Notes</th><th>Actions</th></tr>
<?php

foreach($data as $person){
	echo "<tr>
			<td>$person->first_name</td>
			<td>$person->last_name</td>
			<td>$person->notes</td>
			<td>
			 	<a href='/Person/details/$person->person_id'>details</a> |
			 	<a href='/Person/edit/$person->person_id'>edit</a> |
			 	<a href='/Person/delete/$person->person_id'>delete</a>
			</td>
		</tr>";
}
?>
</table>
</body></html>