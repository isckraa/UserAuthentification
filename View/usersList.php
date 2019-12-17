<section id="unauthorized-section">

    <table class="users-list">
        <tr>
            <td>Email</td>
            <td>Password</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Admin</td>
        </tr>

        <?php (new UserController((new Connection())->getDb()))->tabUsersList(); ?>

    </table>

</section>