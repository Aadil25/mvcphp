<?php
//require_once('Ccc.php');
//Ccc::init();

?>
<div id="root"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react-dom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.21.1/babel.min.js"></script>
<script type="text/javascript" src="https://requirejs.org/docs/release/2.3.6/minified/require.js"></script>
<script type="text/babel">

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

</script>
<!-- <script type="text/javascript" src="./assets/js/react_demo.js"></script>
<div id="app"></div> -->


<script type="text/javascript">  
	if(typeof window.web3 !== "undefined" && typeof window.web3.currentProvider !== "undefined") {
        //var web3 = new Web3(window.web3.currentProvider);
        //var web3 = new Web3(Web3.givenProvider || "ws://localhost:8546");
       // var web3 = window.web3 ? new Web3(window.web3.currentProvider) : new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/[infura-id]"));
        //console.log(web3.personal.listAccounts);
       // web3.personal.newAccount('@!password').then(console.log);
        var password = "m'UxJjB][Tmk";
        //web3.accounts.create(password);
        
        var web3 = new Web3();
        createWallet = cb => {
		  cb(web3.eth.accounts.create());
		};

		createWallet(result => {
  console.log("Wallet Add is:", result.address);
  console.log("Private Key is:", result.privateKey);
});
        //console.log(web3);
        /*var wallet = web3.personal.newAccount('!@superpassword');
        console.log(wallet);*/
        /*web3.personal.newAccount(password,function (error, result) {
	      console.log("In otherFunction with: " + result);
	    });*/

      } else {
        
        alert("hello");
      }
</script>

<script type="text/javascript">
//var web3 = require('web3');
	/*var web3 = require('web3');
	console.log(web3);
	var web3 = new Web3(new Web3.providers.HttpProvider('http://localhost:8545'));
	personal.newAccount('!@superpassword').then(console.log);
	
	var password = "m'UxJjB][Tmk";
    //web3.personal.newAccount('@!password').then(console.log)
     web3.personal.newAccount(password,function (error, result) {
      otherFunction(result);
    });

    function otherFunction(result) {
      console.log("In otherFunction with: " + result);
    }

var flag = false;
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