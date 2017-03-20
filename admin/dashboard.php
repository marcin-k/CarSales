<?php

//Main page dashboard

function getDashboard($username, $password)
{

    echo "
    <main>
        <section>
            <h3>Dashboard</h3>
            <h4>Welcome $username</h4>

            <form form name=\"type\" class =\"small\" action=\"add_update_item.php\" method=\"POST\">
                <input name='username' value=$username hidden>
                <input name='pass' value=$password hidden>

                <button class=\"full\">Add new Car</button>
            </form>

            <form form name=\"type\" class =\"small\" action=\"edit_existing.php\" method=\"POST\">
                <input name='username' value=$username hidden>
                <input name='pass' value=$password hidden>
                <button class=\"full\">Update Existing</button>
            </form>

            <form form name=\"type\" class =\"small\" action=\"settings.php\" method=\"POST\">
                <input name='username' value=$username hidden>
                <input name='pass' value=$password hidden>
                <button class=\"full\">Settings</button>
            </form>


        </section>
    </main>
    ";
}

?>
