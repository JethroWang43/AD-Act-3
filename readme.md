<a name="readme-top">

<br/>

<br />
<div align="center">
  <a href="https://github.com/JethroWang43/">
  </a>
  <h3 align="center">Meeting Calendar</h3></h3>
</div>
<!-- TODO: Make a short description -->
<div align="center">
  A calendar meeting application powered by Docker for easy deployment and scalability.
</div>

<br />

<!-- TODO: Change the zyx-0314 into your github username  -->
<!-- TODO: Change the WD-Template-Project into the same name of your folder -->

![](https://visit-counter.vercel.app/counter.png?page=JethroWang43/AD-ACT-3)

[![wakatime](https://wakatime.com/badge/user/ce1ba829-cf0c-415a-907e-955818b3b253/project/1cd1a57c-bf38-4171-8201-663351d636d7.svg)](https://wakatime.com/badge/user/ce1ba829-cf0c-415a-907e-955818b3b253/project/1cd1a57c-bf38-4171-8201-663351d636d7)

---

<br />
<br />

<!-- TODO: If you want to add more layers for your readme -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
      <ol>
        <li>
          <a href="#key-components">Key Components</a>
        </li>
        <li>
          <a href="#technology">Technology</a>
        </li>
      </ol>
    </li>
    <li>
      <a href="#rule,-practices-and-principles">Rules, Practices and Principles</a>
    </li>
    <li>
      <a href="#resources">Resources</a>
    </li>
  </ol>
</details>

---

## Overview
<!-- Project Description -->
This project is a web-based meeting calendar application designed to help users schedule, manage, and track meetings efficiently. It leverages Docker for simplified deployment and scalability, ensuring a consistent environment across different systems. The application supports user authentication, meeting creation, editing, deletion, and provides a user-friendly interface for managing events.

### Key Components

- Authentication & Authorization: Secure login and access control for users.
- CRUD Operations for Meeting Management: Create, read, update, and delete meetings and events.
- User Interface: Intuitive calendar view for easy scheduling and navigation.
- Database Integration: Persistent storage of user and meeting data.
- Dockerized Deployment: Containerized setup for easy installation and scalability.

### Technology

#### Language
![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

#### Databases
![MySQL](https://img.shields.io/badge/MySQL-00758F?style=for-the-badge&logo=mysql&logoColor=white)
![MongoDB](https://img.shields.io/badge/MongoDB-47A248?style=for-the-badge&logo=mongodb&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql&logoColor=white)


## Rules, Practices and Principles

<!-- Do not Change this -->

1. Always use `AD-` in the front of the Title of the Project for the Subject followed by your custom naming.
2. Do not rename `.php` files if they are pages; always use `index.php` as the filename.
3. Add `.component` to the `.php` files if they are components code; example: `footer.component.php`.
4. Add `.util` to the `.php` files if they are utility codes; example: `account.util.php`.
5. Place Files in their respective folders.
6. Different file naming Cases
   | Naming Case | Type of code         | Example                           |
   | ----------- | -------------------- | --------------------------------- |
   | Pascal      | Utility              | Accoun.util.php                   |
   | Camel       | Components and Pages | index.php or footer.component.php |
8. Renaming of Pages folder names are a must, and relates to what it is doing or data it holding.
9. Use proper label in your github commits: `feat`, `fix`, `refactor` and `docs`
10. File Structure to follow below.

```
AD-ACT-3
└─ assets
|   └─ css
|   |   └─ style.css
|   └─ img
|   |
|   └─ js
|       
└─ components
|   └─ name.component.php
|   └─ templates
|       └─ name.component.php
|       
└─ database
|     └─ meeting_users.model.sql
|     └─ meeting.model.sql
|     └─ tasks.model.sql
|     └─ user.model.sql
└─ handlers
|   └─ example.handler.php
|   └─ mongodbChecker.handler.php
|   └─ postgreChecker.handler.php
└─ layout
|   └─ name.layout.php
└─ pages
|   └─ pageName
|     └─ assets
|     |   └─ css
|     |   |   └─ name.css
|     |   └─ img
|     |   |   └─ name.jpeg/.jpg/.webp/.png
|     |   └─ js
|     |       └─ name.js
|     └─ index.php
└─ staticData
|   └─ name.staticdata.php
└─ utils
|   └─ dbResetPostgresql.util.php
|   └─ envSetter.util.php
|   └─ example.util.php
|   └─ htmlEscape.util.php
└─ vendor
└─ .gitignore
└─ bootstrap.php
└─ composer.json
└─ composer.lock
└─ index.php
└─ readme.md
└─ router.php
```
> The following should be renamed: name.css, name.js, name.jpeg/.jpg/.webp/.png, name.component.php(but not the part of the `component.php`), Name.utils.php(but not the part of the `utils.php`)

## Resources

<!-- TODO: Add References -->

| Title        | Purpose                                                                       | Link          |
| ------------ | ----------------------------------------------------------------------------- | ------------- |
| ChatGPT          | AI-powered assistant for answering coding and technical questions.      | https://chat.openai.com/        |
| Stack Overflow   | Community-driven Q&A for programming and development issues.            | https://stackoverflow.com/      |
| Workbook Activity| Reference for project-related workbook activities and exercises.        | provided by IAN CEDRIC RAMIREZ  |
