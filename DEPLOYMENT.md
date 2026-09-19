# Deploying Tasks for Today

This project is prepared for deployment as a Docker web service on Render with
an Aiven for MySQL database.

## 1. Import the database into Aiven

Use the connection details shown on the Overview page of your Aiven MySQL
service. Import `database/tasks_for_today.sql`. The script creates a separate
database named `tasks_for_today`, creates both required tables, inserts eight
tasks across four dates, and inserts exactly one demo user.

Example from Windows Command Prompt with the XAMPP MySQL client:

```bat
cd C:\xampp\mysql\bin
mysql.exe --host=YOUR_AIVEN_HOST --port=YOUR_AIVEN_PORT --user=avnadmin --password --ssl < C:\PATH\TO\techsum1-main\database\tasks_for_today.sql
```

Enter the Aiven password when prompted. Do not put the password in this file or
commit it to GitHub.

## 2. Push the deployment files to GitHub

Make sure these files are present in the repository:

- `Dockerfile`
- `.dockerignore`
- `docker/apache.conf`
- `database/tasks_for_today.sql`

## 3. Create the Render web service

1. In Render, choose **New > Web Service**.
2. Select the `jiyan66/techsum1` repository.
3. Choose the `main` branch.
4. Set **Language** to `Docker`.
5. Leave **Root Directory** blank.
6. Set **Dockerfile Path** to `./Dockerfile`.
7. Choose the available free instance type and create the service.

## 4. Add Render environment variables

Add these variables under **Environment**. Replace the placeholder values with
the details from the Aiven service Overview page.

| Key | Value |
| --- | --- |
| `CI_ENVIRONMENT` | `production` |
| `app_baseURL` | `https://YOUR-RENDER-SERVICE.onrender.com/` |
| `database_default_hostname` | Aiven host |
| `database_default_database` | `tasks_for_today` |
| `database_default_username` | `avnadmin` |
| `database_default_password` | Aiven password |
| `database_default_DBDriver` | `MySQLi` |
| `database_default_port` | Aiven port |
| `database_default_encrypt` | `true` |
| `database_default_DBDebug` | `false` |

Save the variables, then choose **Manual Deploy > Deploy latest commit**.

## 5. Verify the four required pages

- `/` displays only tasks whose `task_date` is today.
- `/tasks` displays every task ordered by date.
- `/profile` displays the single demo user.
- `/about` identifies Joseph Gian Carlo Mistica as the developer.

Never commit a real `.env` file or any Aiven password to GitHub.
