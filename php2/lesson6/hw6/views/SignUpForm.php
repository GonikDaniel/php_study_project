<div id="registr_form">
    <form method="post" action="">
        <table>
            <tr>
                <td><label>Ваше имя:</label></td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><label>Пароль:</label></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><label>Повторите пароль:</label></td>
                <td><input type="password" name="password2"></td>
            </tr>
            <tr>
                <td><label>Email: </label></td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td><label>Группа: </label></td>
                <td>
                    <select name="groupID">
                        <option value="1">Пользователь</option>
                        <option value="2">Developer</option>
                        <option value="3">Designer</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Регистрация"></td>
            </tr>
        </table>
    </form>
</div>