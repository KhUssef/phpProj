<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='cssobjs/settings.css' />

</head>

<body>
    <form class="form">
        <label>
            <input required="" placeholder="" type="email" class="input">
            <span>full Name</span>
        </label>
        <label>
            <input required="" placeholder="" type="email" class="input">
            <span>email</span>
        </label>

        <label>
            <input required="" type="tel" placeholder="" class="input">
            <span>password</span>
        </label>
        <div class="flex">
            <label>
                <input required="" placeholder="" type="text" class="input">
                <span>experience</span>
            </label>
            <label>
                <input required="" placeholder="" type="number" min='0' autocomplete="off" class="input">
                <span>last name</span>
            </label>
        </div>
        <label>
            <textarea required="" rows="3" placeholder="" class="input01"></textarea>
            <span>Description</span>
        </label>
        <button class="fancy" href="#">
            <span class="top-key"></span>
            <span class="text">submit</span>
            <span class="bottom-key-1"></span>
            <span class="bottom-key-2"></span>
        </button>
        <label for="file-input" class="drop-container">
            <span class="drop-title">Drop descriotion here</span>
            or
            <input type="file" accept="pdf/*" required="" id="file-input">
        </label>
    </form>
</body>

</html>