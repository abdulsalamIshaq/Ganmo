<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $data['title'] ?></title>
    <style>
        body {
            background-color: #f9f9f9;
            margin: 40px;
            font: 15px/20px normal Helvetica, Arial, sans-serif;
            color: #fff;
        }

        .container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 10px #D0D0D0;
            background: #2e2e2e;
        }

        .content {
            margin: 0 15px 0 15px;
        }

        a {
            color: #32903f;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #fff;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php echo h($data['title'], 1); ?>
        <div class="content">
            <p>
                This is a simple php framework developed by <a href="https://github.com/kayode-suc/">Abdulsalam Ishaq</a>
                for learning purpose, it was designed to imrove my php skills.
            </p>
            <?php
            echo
                p('This project is an open source simple application framework for php');
            echo
                p(
                    'Permission is hereby granted, free of charge, to any person obtaining a copy
                of this software and associated documentation files (the "Software"), to deal
                in the Software without restriction, including without limitation the rights
                to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                copies of the Software, and to permit persons to whom the Software is
                furnished to do so, subject to the following conditions: 

                The above copyright notice and this permission notice shall be included in
                all copies or substantial portions of the Software.'
                );
            echo
                p(
                    'THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
                THE SOFTWARE.'
                );
            ?>
            <center>
                <a href="">
                    <h3>Read our docs</h3>
                </a>
            </center>
            <p class="footer">
                This project is released under <strong><a href="https://opensource.org/licenses/MIT">MIT license</a></strong>.
                Ganmo Version <strong><? echo VERSION; ?></strong>
            </p>
        </div>
    </div>
</body>

</html>