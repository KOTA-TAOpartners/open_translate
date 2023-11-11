<?php
$languages = include('languagelist.php');
$selectedLanguage_speaker = "EN";
$selectedLanguage_listner = "JA";
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>高速・多言語対応通訳サービス | シンプルで使いやすい</title>

        <meta name="description" content="当サイトでは、数クリックで多言語に対応した高精度な通訳が可能です。ビジネスや旅行に最適な通訳ツールを提供します。">
        <meta name="keywords" content="通訳, 多言語, 翻訳, シンプル, ユーザーフレンドリー, ビジネス, 旅行">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="高速・多言語対応通訳サービス">
        <meta property="og:description" content="ビジネスや旅行に最適な、シンプルで使いやすい通訳ツール">
        <meta property="og:image" content="assets/img/logo.png">
        <meta property="og:url" content="https://official-stylelab.com/translate/">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="高速・多言語対応通訳サービス">
        <meta name="twitter:description" content="ビジネスや旅行に最適な、シンプルで使いやすい通訳ツール">
        <meta name="twitter:image" content="assets/img/logo.png">
        <link rel="icon" type="image/x-icon" href="logo.ico">
        <link rel="canonical" href="https://official-stylelab.com/translate/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
    </head>

    <body>
        <div class="text-center header-img">
            <img src="assets/img/hack-a-day5.png">
        </div>
        <h1 style="font-weight: 500; margin: 50px auto; text-align: center;">お手軽・高精度な通訳サイト</h1>
        <p class="lead" style="text-align:center;margin-bottom: 30px;">特別な環境がなくても、特別な技術がなくてもスマートフォン1つで<br>高精度・高速度な通訳を可能にしてくれます。</p>


        
        <div class="tab-content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                    使い方(日本語)
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    How to Use (ENGLISH)
                </button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1.「SPEAKER」から、話し手の使用言語を選択します。</li>
                        <li class="list-group-item">2.「LISTENER」から、聞き手の使用言語を選択します。</li>
                        <li class="list-group-item">3. 準備ができたら「START」を押します。</li>
                        <li class="list-group-item">4. マイクの使用を許可します。</li>
                        <li class="list-group-item">5. マイクに向かって話しかけます。</li>
                        <li class="list-group-item">6. 話し終えたら「STOP」を押します。</li>
                        <li class="list-group-item">7. 少し待つと(2)で選択した言語で音声が流れ始めます。</li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1. From "SPEAKER", select the language used by the speaker.</li>
                        <li class="list-group-item">2. From "LISTENER", select the language used by the listener.</li>
                        <li class="list-group-item">3. When ready, press "START.</li>
                        <li class="list-group-item">4. Allows the use of microphones.</li>
                        <li class="list-group-item">5. Speak into the microphone.</li>
                        <li class="list-group-item">6. Press "STOP" when you have finished speaking.</li>
                        <li class="list-group-item">7. After a short wait, audio will begin to play in the language selected in (2).</li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="text-center speaking">
            <img src="assets/img/hack-a-day4.png">
        </div>

        <div class="container label">
            <div class="row">
            <div class="col">
                <div class="text-center">
                <img src="assets/img/speaker.png">
                </div>
            </div>
            <div class="col">
                <div class="text-center">
                <img src="assets/img/listener.png">
                </div>
            </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col selecter">
                    <div id="input-div" class="form-control"></div>
                </div>
                
                <div class="col selecter">
                    <div id="output-div" class="form-control"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col">
                    <form name="inputLanguage">
                        <div class="form-control">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2">
                                    <?php foreach ($languages as $language): ?>
                                        <div class="col-sm">
                                            <input type="radio" name="input" <?php echo ($language["code"] == $selectedLanguage_speaker) ? 'checked' : ''; ?> onclick="changeFromLang('<?php echo $language['code']; ?>', '<?php echo $language['locale']; ?>')"> 
                                            <?php echo $language["name"]; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col">
                    <form name="outputLanguage">
                        <div class="form-control">
                            <div class="container">
                            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2">
                                    <?php foreach ($languages as $language): ?>
                                        <div class="col-sm">
                                            <input type="radio" name="output" <?php echo ($language["code"] == $selectedLanguage_listner) ? 'checked' : ''; ?> onclick="changeToLang('<?php echo $language['code']; ?>', '<?php echo $language['locale']; ?>')"> 
                                            <?php echo $language["name"]; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="button" id="start-btn">START</button>
            <button class="btn btn-primary" type="button" id="stop-btn">STOP</button>
        </div>            

        <script src="assets/style.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>