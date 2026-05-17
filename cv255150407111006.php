<html>
    <head>
    <style>
    .center{
        text-align: center
    }
    .skill-mid{
        display: flex;
        justify-content: space-between;
        margin-top: 20;
    }
    .skill{
        display: flex;
        gap: 60px;
        margin-top: 10px;
    }
    .skill div {
        flex 1;
    }
    </style>
    </head>
    <body>
        <div align="center" style="font-size: 30px;">Bernadette Aster Masdah Ngati Sinaga</style></div>
        <div align="center"> Information System </div>

        <br>

            <diV>NIM: 255150407111006</div>
            <div>Email: bernadette1@student.ub.ac.id</div>
        
        <br>
        
        <?php
        echo "Information Systems student with leadership experience in organizational roles and collaborative group projects. Experienced in
        coordinating events, managing team responsibilities, and ensuring activities are executed according to plan and timeline. Eager to
        further develop expertise in the Project Manager role and continuously enhance skills to become a reliable and effective project
        manager.";
        ?>

        <hr style="height: 1.5px; border-width: 0; color: black; background-color: black">

        <p><b>EDUCATION</b><br>
        <?php
        echo "<b>SMAK Kolese Santo Yusup Malang (2022 - 2025)
        <br>Bachelor of Information Systems (2025 - 2029)</b>
        <br><i>University of Brawijaya, Malang City</i>";
        ?>

        <p><b>PROFESSIONAL EXPERIENCE</b></p>

        <?php
        $experience1 = [
        "Led and supervised weekly organizational meetings, ensuring structured discussions and consistent member participation.",
        "Managed official meeting documentation (notulen) based on the Handbook of the Legion of Mary, producing verified written reports signed by the President and Spiritual Director as formal proof of activity.",
        "Monitored member attendance and handled permission coordination as Vice President, maintaining accountability and active engagement within the team.",
        "Demonstrated discipline as President by guiding members through example and maintaining organizational standards.",
        "Coordinated a youth event by organizing task distribution, supervising execution, and ensuring the programran according to schedule",
        ];
        
        $experience2 =[
        "Collaborated in developing a functional website using HTML, CSS, JavaScript, PHP, and MySQL (phpMyAdmin) for database management.",
        "Designed user interface prototypes using Figma to align team understanding and improve product clarity before development.",
        "Utilized ClickUp to manage task allocation and project timeline, ensuring structured progress and step-by step completion.",
        "Used GitHub for version control and collaborative development, improving workflow coordination amongteam members.",
        "Contributed to a scientific project.",
        ];
        ?>

        <div class="class">

            <div>
                Legio Maria – Catholic Youth Organization
                <br>President / Vice President / Secretary
                <ul>
                    <?php
                    foreach($experience1 as $exp1){
                        echo "<li>$exp1</li>";
                    }
                    ?>
                </ul>
            </div>

            <div>
                <p>Group Project – Website Development 
                    <ul>
                        <?php
                        foreach($experience2 as $exp2){
                            echo "<li>$exp2</li>";
                        }
                        ?>
                    </ul>
            </div>

        </div>        

        <hr style="height: 1.5px; border-width: 0; color: black; background-color: black">
        <p><b>SKILL & LANGUANGES</b></p>

        <?php
        $softSkills = [
        "Leadership: Led and guided members as President of Legio Maria.",
        "Teamwork & Collaboration: Worked closely with members during projects.",
        "Time Management: Managed schedules and ensured timelines.",
        "Communication Skills: Facilitated clear communication and documentation.",
        "Problem Solving: Used ClickUp and GitHub for coordination."
        ];  

        $hardSkills = [
        "JavaScript, PHP, Java (Basic)",
        "SQL (Basic Concepts)",
        "GitHub (Basic CI/CD)",
        "Figma",
        "ClickUp, Google Workspace"
        ];

        $languages = [
        "Indonesian — Native",
        "English — Intermediate"
        ];
        ?>

        <div class="skill">

            <div>
                <i>softskills</i>
                <ul>
                    <?php
                    foreach ($softSkills as $skill){
                        echo "<li>$skill</li>";
                    }
                    ?>
                </ul>

                <i>hardskills</i>
                <ul>
                    <?php
                    foreach ($hardSkills as $skill){
                        echo "<li>$skill</li>";
                    }
                    ?>
                </ul>

                <i>languanges</i>
                <ul>
                    <?php
                    foreach($languages as $lang){
                        echo "<li>$lang</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

    </body>
</html>