<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Insights</title>

  <style type="text/css">
    .progress::after {
      content: attr(data-progress) '';
      display: flex;
      justify-content: center;
      flex-direction: column;
      width: 100%;
      margin: 10px;
      border-radius: 50%;
      background: white;
      font-size: 1.5rem;
      text-align: center;
    }

    .progress {
      display: flex;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      font-size: 0;
    }
  </style>
</head>

<body>
  <table style="width: 100%; max-width: 600px; margin: 0 auto; border-collapse: collapse; background-color: #f5f5f5;">
    <tr>
      <td style="background-color: antiquewhite; padding: 20px; text-align: center;">
        <!-- <img src="https://orionesolutions.com/wp-content/themes/astra/assets/images/orion-esolutions-logo.svg" alt="Orion eSolutions Inc." style="display: block;height: 30px; max-width: 100%;">
 -->
      </td>
    </tr>
    <tr>
      <td style="padding: 20px;">
        <h1 style="margin-top: 4px; font-size: 18px; font-weight: bold;">Dear valued customer,</h1>
        <p style="margin-top: 4px; font-size: 16px; line-height: 1.5;">
          We have completed the analysis and have compiled the results free only for you.
        </p>

        <p style="margin-top: 4px; font-size: 16px; line-height: 1.5;">
          We hope that this information is helpful and encourage you to take action to make the necessary improvements. If you have any questions or need further assistance, please do not hesitate to reach out to us.
        </p>

        <p style="margin-top: 4px; font-size: 16px; line-height: 1.5;">
          Thank you again for your time and we look forward to helping you improve your website.
        </p>

      </td>
    </tr>
    <tr>
      <td style="padding: 20px;">
        <p>Site: <a href="{{ $data['site_url'] }}">{{ $data['site_url'] }}</a></p>

        @if($data['mobile']['is_data'])

        <p>{{ $data['mobile']['strategy'] }}</p>

        <div style="display: flex; justify-content: space-evenly; padding:10px">

          <div style="text-align: center;">
            <div class="progress" data-progress="{{ $data['mobile']['categories']['performance']['score'] }}" style="--progress: {{ $data['mobile']['categories']['performance']['degree'] }}deg; display: flex; width: 100px; height: 100px; border-radius: 50%; background: conic-gradient(<?= $data['mobile']['categories']['performance']['roundc'] ?> var(--progress), #eee 0deg); font-size: 0; color: <?= $data['mobile']['categories']['performance']['textc'] ?>">
              {{ $data['mobile']['categories']['performance']['score'] }}
            </div>
            <p>{{ $data['mobile']['categories']['performance']['title'] }}</p>
          </div>

          <div style="text-align: center;">
            <div class="progress" data-progress="{{ $data['mobile']['categories']['accessibility']['score'] }}" style="--progress: {{ $data['mobile']['categories']['accessibility']['degree'] }}deg; display: flex; width: 100px; height: 100px; border-radius: 50%; background: conic-gradient(<?= $data['mobile']['categories']['accessibility']['roundc'] ?> var(--progress), #eee 0deg); font-size: 0; color: <?= $data['mobile']['categories']['accessibility']['textc'] ?>">
              {{ $data['mobile']['categories']['accessibility']['score'] }}
            </div>
            <p>{{ $data['mobile']['categories']['accessibility']['title'] }}</p>
          </div>

          <div style="text-align: center;">
            <div class="progress" data-progress="{{ $data['mobile']['categories']['best_practices']['score'] }}" style="--progress: {{ $data['mobile']['categories']['best_practices']['degree'] }}deg; display: flex; width: 100px; height: 100px; border-radius: 50%; background: conic-gradient(<?= $data['mobile']['categories']['best_practices']['roundc'] ?> var(--progress), #eee 0deg); font-size: 0; color: <?= $data['mobile']['categories']['best_practices']['textc'] ?>">
              {{ $data['mobile']['categories']['best_practices']['score'] }}
            </div>
            <p>{{ $data['mobile']['categories']['best_practices']['title'] }}</p>
          </div>

          <div style="text-align: center;">
            <div class="progress" data-progress="{{ $data['mobile']['categories']['seo']['score'] }}" style="--progress: {{ $data['mobile']['categories']['seo']['degree'] }}deg; display: flex; width: 100px; height: 100px; border-radius: 50%; background: conic-gradient(<?= $data['mobile']['categories']['seo']['roundc'] ?> var(--progress), #eee 0deg); font-size: 0; color: <?= $data['mobile']['categories']['seo']['textc'] ?>">
              {{ $data['mobile']['categories']['seo']['score'] }}
            </div>
            <p>{{ $data['mobile']['categories']['seo']['title'] }}</p>
          </div>

        </div>


        <hr>
        <br>
        @endif

        @if($data['desktop']['is_data'])
        <p>{{ $data['desktop']['strategy'] }}</p>
        <div style="display: flex; justify-content: space-evenly; padding:10px">

          <div style="text-align: center;">
            <div class="progress" data-progress="{{ $data['desktop']['categories']['performance']['score'] }}" style="--progress: {{ $data['desktop']['categories']['performance']['degree'] }}deg; display: flex; width: 100px; height: 100px; border-radius: 50%; background: conic-gradient(<?= $data['mobile']['categories']['performance']['roundc'] ?> var(--progress), #eee 0deg); font-size: 0; color: <?= $data['mobile']['categories']['performance']['textc'] ?>">
              {{ $data['desktop']['categories']['performance']['score'] }}
            </div>
            <p>{{ $data['desktop']['categories']['performance']['title'] }}</p>
          </div>

          <div style="text-align: center;">
            <div class="progress" data-progress="{{ $data['desktop']['categories']['accessibility']['score'] }}" style="--progress: {{ $data['desktop']['categories']['accessibility']['degree'] }}deg; display: flex; width: 100px; height: 100px; border-radius: 50%; background: conic-gradient(<?= $data['mobile']['categories']['accessibility']['roundc'] ?> var(--progress), #eee 0deg); font-size: 0; color: <?= $data['mobile']['categories']['accessibility']['textc'] ?>">
              {{ $data['desktop']['categories']['accessibility']['score'] }}
            </div>
            <p>{{ $data['desktop']['categories']['accessibility']['title'] }}</p>
          </div>

          <div style="text-align: center;">
            <div class="progress" data-progress="{{ $data['desktop']['categories']['best_practices']['score'] }}" style="--progress: {{ $data['desktop']['categories']['best_practices']['degree'] }}deg; display: flex; width: 100px; height: 100px; border-radius: 50%; background: conic-gradient(<?= $data['mobile']['categories']['best_practices']['roundc'] ?> var(--progress), #eee 0deg); font-size: 0; color: <?= $data['mobile']['categories']['best_practices']['textc'] ?>">
              {{ $data['desktop']['categories']['best_practices']['score'] }}
            </div>
            <p>{{ $data['desktop']['categories']['best_practices']['title'] }}</p>
          </div>

          <div style="text-align: center;">
            <div class="progress" data-progress="{{ $data['desktop']['categories']['seo']['score'] }}" style="--progress: {{ $data['desktop']['categories']['seo']['degree'] }}deg; display: flex; width: 100px; height: 100px; border-radius: 50%; background: conic-gradient(<?= $data['mobile']['categories']['seo']['roundc'] ?> var(--progress), #eee 0deg); font-size: 0; color: <?= $data['mobile']['categories']['seo']['textc'] ?>">
              {{ $data['desktop']['categories']['seo']['score'] }}
            </div>
            <p>{{ $data['desktop']['categories']['seo']['title'] }}</p>
          </div>

        </div>
        @endif

      </td>
    </tr>

    <tr>
      <td>
        <div>

        </div>
      </td>
    </tr>

    <tr>
      <td style="padding: 20px;">
        <br>
        <p>
          Sincerely,
        </p>
        <p>Orion Team</p>
      </td>
    </tr>
    <tr>
      <td style="background-color:antiquewhite; padding: 20px; text-align: center;">
        <a style="margin: 0; font-size: 14px;" href="https://orionesolutions.com/">Orion eSolutions Inc.</a>
      </td>
    </tr>
  </table>


</body>

</html>