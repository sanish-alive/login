<?php
require "profile.php";
?>

<article>
	<div class=edit_profile>
		<h1>Change Password</h1>
		
		<table>
			<tr>
				<label>
					<td>Password</td>
					<td><input type="text" name="pwd"></td>
				</label>
			</tr>
			<tr>
				<label>
					<td>New Password</td>
					<td><input type="text" name="npwd"></td>
				</label>
			</tr>
			<tr>
				<label>
					<td>Retype New Password</td>
					<td><input type="text" name="cpwd"></td>
				</label>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit">

				</td>
			</tr>
		</table>
	</div>
</article>
