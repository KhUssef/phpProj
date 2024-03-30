<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=New+Rocker&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            height: 100vh;
            text-align: center;
            font-size: 120;
            font-family: "New Rocker", system-ui;
            font-weight: 400;
            font-style: normal;
            font-size: 20px;
            background-color: #313131;
            background-image: radial-gradient(rgba(255, 255, 255, 0.171) 2px, transparent 0);
            background-size: 30px 30px;
            background-position: -5px -5px;
        }

        a {
            text-decoration: none;
        }

        h1 {
            position: absolute;
            top: 38%;
            left: 35%;
            color: antiquewhite;
        }

        button {
            display: absolute;
            top: 50%;
            left: 47%;
            padding: 0;
            margin: 0;
            border: none;
            background: none;
            cursor: pointer;
        }

        button {
            --primary-color: #111;
            --hovered-color: #c84747;
            position: relative;
            display: flex;
            font-weight: 600;
            font-size: 20px;
            gap: 0.5rem;
            align-items: center;
        }

        button p {
            margin: 0;
            position: relative;
            font-size: 20px;
            color: var(--primary-color);
        }

        button::after {
            position: absolute;
            content: "";
            width: 0;
            left: 0;
            bottom: -7px;
            background: var(--hovered-color);
            height: 2px;
            transition: 0.3s ease-out;
        }

        button p::before {
            position: absolute;
            /*   box-sizing: border-box; */
            content: "HOME!";
            width: 0%;
            inset: 0;
            color: var(--hovered-color);
            overflow: hidden;
            transition: 0.3s ease-out;
        }

        button:hover::after {
            width: 100%;
        }

        button:hover p::before {
            width: 100%;
        }

        button:hover svg {
            transform: translateX(4px);
            color: var(--hovered-color);
        }

        button svg {
            color: var(--primary-color);
            transition: 0.2s;
            position: relative;
            width: 15px;
            transition-delay: 0.2s;
        }
    </style>
</head>

<body>
    <h1>thank you for the feedback</h1>
    <a href='home.php'><button>
            <p>HOME!</p>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </button>
    </a>

</body>

</html>