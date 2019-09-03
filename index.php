<?php
require_once('Ccc.php');
Ccc::init();

?>
<!-- <div id="root"></div>

<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script> -->
<!-- <script type="text/javascript" src="web3.js"></script> -->
<!-- <script type="text/babel">

class Greeting extends React.Component {
    render() {
        return (<p>Hello world</p>);
    }
}
ReactDOM.render(
    <Greeting />,
    document.getElementById('root')
);

class chart extends React.Component {
    render() {
        return (<p></p>);
    }
}

</script> -->
<!-- <script type="text/javascript" src="./assets/js/react_demo.js"></script>
<div id="app"></div> -->



<script type="text/javascript">

  /*if (window.ethereum) {
    web3Provider = window.ethereum;
    try {
      // Request account access
      //window.ethereum.enable();
    } catch (error) {
      // User denied account access...
      console.error("User denied account access")
    }
  }
  // Legacy dapp browsers...
  else if (window.web3) {
    web3Provider = window.web3.currentProvider;
  }
  // If no injected web3 instance is detected, fall back to Ganache
  else {
    web3Provider = new Web3.providers.HttpProvider('http://localhost:7545');
  }
  web3 = new Web3(web3Provider);
  
  //createWallet = web3.eth.personal.newAccount('!@superpassword').then(console.log);
  createWallet = web3.eth.accounts.wallet.create(1 ,'54674321§3456764321§345674321§3453647544±±±§±±±!!!43534534534534');
  console.log(createWallet);*/
//var web3 = require('web3');
	
  /*var Web3EthPersonal = require('web3-eth-personal');
 
  var personal = new Web3EthPersonal('ws://localhost:8546');
  console.log(personal);*/

	//var web3 = new Web3(new Web3.providers.HttpProvider('http://localhost:8545'));
	//personal.newAccount('!@superpassword').then(console.log);
	
	
/*var flag = false;
var version = web3.version.api;

function isInstalled() {
   if (typeof web3 !== 'undefined'){
      flag = true;
      console.log('MetaMask is installed');

      let wallet = web3.eth.accounts.create();
      console.log(wallet);

      //ethereum.enable();
   } 
   else{
      flag = false;
      console.log('MetaMask is not installed')
   }
}
isInstalled();
function isLocked() {
   web3.eth.getAccounts(function(err, accounts){

   		var tx = web3.eth.sendTransaction({ 
			from: accounts[0],
			gasPrice: "20000000000",
			gas: "21000",
			to: '0x4851c1fa76043d04a021c168fe91411d08b3afbc', 
			value: 1000,
			data: ""
			}, function(err, transactionHash) {
			if (!err)
			console.log(transactionHash); 
		})
		
      if (err != null) {
         console.log(err)
      }
      else if (accounts.length === 0) {
      	web3.version.getNetwork((err, netId) => {
		  switch (netId) {
		    case "1":
		      console.log('This is mainnet')
		      break
		    case "2":
		      console.log('This is the deprecated Morden test network.')
		      break
		    case "3":
		      console.log('This is the ropsten test network.')
		      break
		    case "4":
		      console.log('This is the Rinkeby test network.')
		      break
		    case "42":
		      console.log('This is the Kovan test network.')
		      break
		    default:
		      console.log('This is an unknown network.')
		  }
		})
         console.log('MetaMask is locked')
      }
      else {
         console.log('MetaMask is unlocked')
      }
   });
}
if(flag == true){
	isLocked();
}

function checkBalance() {
   tokenInst.balanceOf(
      web3.eth.accounts[0], 
      function (error, result) {

      if (!error && result) {
         var balance = result.c[0];

         if (balance < balanceNeeded * (100000000)) {
            console.log('MetaMask shows insufficient balance')
            return false;
         }
         console.log('MetaMask shows sufficient balance')
         // Include here your transaction function here
      }
      else {
         console.error(error);
      }
      return false;
   });
}*/
</script>