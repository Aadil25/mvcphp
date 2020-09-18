<!-- <script src="https://cdn.jsdelivr.net/npm/eth-sig-util@2.4.4/index.min.js"></script> -->
<script src="http://172.10.24.46/mm/assets/js/jquery.min.js"></script>
<!-- <script src="http://172.10.24.46/mm/assets/js/require.js"></script> -->
<script src="http://172.10.24.46/mm/assets/js/web3.js"></script>
<script src="http://172.10.24.46/mm/base64-js.js"></script>

<!-- <script src="http://172.10.24.46/mm/buffer.js"></script> -->


<p class="new_wallet"> This is wallet </p>
<?php 
   // Author: holdoffhunger@gmail.com
   
        // Example Hexadecimal
        // ---------------------------------------------

    $hexadecimal_number = "0Ed59C58074bBd9607eD2e8CDbce1001D8d89337";

        // Format Hexadecimal
        // ---------------------------------------------

    $hexadecimal_to_convert_to_binary_testable = strtolower($hexadecimal_number);

        // Get String Length of Hexadecimal
        // ---------------------------------------------

    $length_of_text_to_convert_to_binary = strlen($hexadecimal_number);

        // Initialize Result Variable
        // ---------------------------------------------

    $results_of_hexadecimal_to_binary_conversion = "";

        // Parse Hexadecimal String
        // ---------------------------------------------
   
    for($i = 0; $i < $length_of_text_to_convert_to_binary; $i++)
    {
        $current_char_of_hexadecimal_for_conversion = $hexadecimal_to_convert_to_binary_testable[$i];
        //$results_of_hexadecimal_to_binary_conversion .="  ";
        switch($current_char_of_hexadecimal_for_conversion)
        {
            case '0':
                $results_of_hexadecimal_to_binary_conversion .= "0000";
                break;
               
            case '1':
                $results_of_hexadecimal_to_binary_conversion .= "0001";
                break;
               
            case '2':
                $results_of_hexadecimal_to_binary_conversion .= "0010";
                break;
               
            case '3':
                $results_of_hexadecimal_to_binary_conversion .= "0011";
                break;
               
            case '4':
                $results_of_hexadecimal_to_binary_conversion .= "0100";
                break;
               
            case '5':
                $results_of_hexadecimal_to_binary_conversion .= "0101";
                break;
               
            case '6':
                $results_of_hexadecimal_to_binary_conversion .= "0110";
                break;
               
            case '7':
                $results_of_hexadecimal_to_binary_conversion .= "0111";
                break;
               
            case '8':
                $results_of_hexadecimal_to_binary_conversion .= "1000";
                break;
               
            case '9':
                $results_of_hexadecimal_to_binary_conversion .= "1001";
                break;
               
            case 'a':
                $results_of_hexadecimal_to_binary_conversion .= "1010";
                break;
               
            case 'b':
                $results_of_hexadecimal_to_binary_conversion .= "1011";
                break;
               
            case 'c':
                $results_of_hexadecimal_to_binary_conversion .= "1100";
                break;
               
            case 'd':
                $results_of_hexadecimal_to_binary_conversion .= "1101";
                break;
               
            case 'e':
                $results_of_hexadecimal_to_binary_conversion .= "1110";
                break;
               
            case 'f':
                $results_of_hexadecimal_to_binary_conversion .= "1111";
                break;
        }
    }

        // Print Results
        // ---------------------------------------------

    print($results_of_hexadecimal_to_binary_conversion);

?>
<h2>Send Ether</h2>
    <div>From: <select id="sendFrom"><option value="0x6eAa484a2eDA9f957355b3D9697C6AF684792b77">0x6eAa484a2eDA9f957355b3D9697C6AF684792b77</option></select></div>
    <div>To: <input id="sendTo" size="40" type="text" value="0xFd119DB7e8e05c9ebf0F83C48235C9e4C32633d1"/></div>
    <div>Ether: <input id="sendValueAmount" type="text"></div>
    <div>
      <button onclick="sendEth()">Send Ether</button>
    </div>
    <button id="metamask" onclick="metamaskLogin()">Login with metamask</button>

<div class="row border-bottom" >
        <div class="col-6">
          <h3>Sign Typed Data</h3>
        </div>
        <div class="col-6">
          <button type="button" class="btn btn-dark" id="signTypedDataButton">sign typed data</button>
        </div>
      </div>
<script type="text/javascript">
/*var hash = sha512.create();
hash.update('Message to hash');
console.log(hash.hex());*/
console.log(Date.now());
signTypedDataButton.addEventListener('click', function(event) {
  event.preventDefault()

  const msgParams = [
    {
      type: 'string',
      name: 'Message',
      value: 'Hi, Alice!'
    },
    {
      type: 'uint32',
      name: 'A number',
      value: '1337'
    }
  ]

  if (window.ethereum) {
    web3Provider = window.ethereum;
    try {
    } catch (error) {
      console.error("User denied account access")
    }
  }
  else if (window.web3) {
    web3Provider = window.web3.currentProvider;
  }
  else {
    web3Provider = new Web3.providers.HttpProvider('http://localhost:7545');
  }
  web3 = new Web3(web3Provider);
  console.log(web3.eth.accounts[0]);

  /*window.ethereum.on('networkChanged', function (netId) {
  // Time to reload your interface with netId

})*/

  var from = web3.eth.accounts[0]
  if (!from) return ethereum.enable()

  ethereum.send({
    method: 'eth_signTypedData',
    params: msgParams,
    from: web3.eth.accounts[0], // Provide the user's account to use.
  })
  .then(function (result) {
    // The result varies by method, per the JSON RPC API.
    // For example, this method will return a transaction hash on success.
  })
  .catch(function (error) {
   // Like a typical promise, returns an error on rejection.
  })
  console.log(web3.currentProvider);

  /*  web3.eth.signTypedData not yet implemented!!!
   *  We're going to have to assemble the tx manually!
   *  This is what it would probably look like, though:
    web3.eth.signTypedData(msg, from) function (err, result) {
      if (err) return console.error(err)
      console.log('PERSONAL SIGNED:' + result)
    })
  */

   

})

function metamaskLogin(){

  if (window.ethereum) {
    web3Provider = window.ethereum;
    try {
    } catch (error) {
      console.error("User denied account access")
    }
  }
  else if (window.web3) {
    web3Provider = window.web3.currentProvider;
  }
  else {
    web3Provider = new Web3.providers.HttpProvider('http://localhost:7545');
  }
  web3 = new Web3(web3Provider);
  
  ethereum.autoRefreshOnNetworkChange = false;

  ethereum.enable()
  .then(function (accounts) {
    var from = accounts[0];
    
    const msgParams = [
        {
          type: 'string',
          name: 'Message',
          value: 'Hi, Alice!'
        },
        {
          type: 'uint32',
          name: 'A number',
          value: '1337'
        }
      ]
      var params = [msgParams, from]
      var method = 'eth_signTypedData'

      var privateKey = "9d26ca3d75170f16462e3b3ab2150c7691557b0130c7764b9d82f9d720d8465b";
      console.log(web3.eth.accounts.privateKeyToAccount("0x" + privateKey))
      
      web3.shh.addPrivateKey(privateKey)
.then(console.log);
      /*var prime_length = 60;
      var diffHell = window.crypto.createDiffieHellman(prime_length);

      diffHell.generateKeys('base64');
      console.log("Public Key : " ,diffHell.getPublicKey('base64'));
      console.log("Private Key : " ,diffHell.getPrivateKey('base64'));

      console.log("Public Key : " ,diffHell.getPublicKey('hex'));
      console.log("Private Key : " ,diffHell.getPrivateKey('hex'));*/
      /*var methodNewKey = "newKeyPair"
      web3.currentProvider.sendAsync({
        methodNewKey,
        from,
      }, function (err, result) {
        if (err) return console.dir(err)
        if (result.error) {
          alert(result.error.message)
        }
        if (result.error) return console.error(result)
        console.log('Shh newKey Pair:' + JSON.stringify(result.result))

      })*/

      web3.currentProvider.sendAsync({
        method,
        params,
        from,
      }, function (err, result) {
        if (err) return console.dir(err)
        if (result.error) {
          alert(result.error.message)
        }
        if (result.error) return console.error(result)
          
        console.log('PERSONAL SIGNED:' + JSON.stringify(result.result))

        /*const recovered = sigUtil.recoverTypedSignatureLegacy({ data: msgParams, sig: result.result })

        if (ethUtil.toChecksumAddress(recovered) === ethUtil.toChecksumAddress(from)) {
          alert('Successfully ecRecovered signer as ' + from)
        } else {
          alert('Failed to verify signer when comparing ' + result + ' to ' + from)
        }*/

      })
  })
  .catch(function (error) {
    // Handle error. Likely the user rejected the login
    console.error(error)
  })
  
  account = web3.eth.accounts;
  
  //web3.shh.newKeyPair().then(console.log);

  if (!window.crypto && !window.msCrypto) 
    throw new Error('window.crypto not available');
  if (window.crypto && window.crypto.getRandomValues) 
    var crypto = window.crypto;
  else if (window.msCrypto && window.msCrypto.getRandomValues) //internet explorer
    var crypto = window.msCrypto;
  else 
    throw new Error('window.crypto.getRandomValues not available');

  var bbuf = new Uint32Array(64);
  //window.crypto.getRandomValues(bbuf).toString('base64');
  

  var Salt = {
 
    _pattern : /[a-zA-Z0-9_\-\+\.]/,
    
    
    _getRandomByte : function()
    {
      // http://caniuse.com/#feat=getrandomvalues
      if(window.crypto && window.crypto.getRandomValues) 
      {
        var result = new Uint8Array(1);
        window.crypto.getRandomValues(result);
        return result[0];
      }
      else if(window.msCrypto && window.msCrypto.getRandomValues) 
      {
        var result = new Uint8Array(1);
        window.msCrypto.getRandomValues(result);
        return result[0];
      }
      else
      {
        return Math.floor(Math.random() * 256);
      }
    },
    
    generate : function(length)
    {
      return Array.apply(null, {'length': length})
        .map(function()
        {
          var result;
          while(true) 
          {
            result = String.fromCharCode(this._getRandomByte());
            if(this._pattern.test(result))
            {
              return result;
            }
          }        
        }, this)
        .join('');  
    }    
      
  };
  /*console.log(bbuf);
  console.log(Salt.generate(bbuf.length));*/
  /*if (typeof encoding !== 'string' || encoding === '') {
    encoding = 'base64'
  }

  var length = byteLength(bbuf, encoding) | 0
  alert(length);
  var buf = createBuffer(length)

  var actual = buf.write(bbuf, encoding)

  if (actual !== length) {
    // Writing a hex string, for example, that contains invalid characters will
    // cause everything after the first invalid character to be ignored. (e.g.
    // 'abxxcd' will be treated as 'ab')
    buf = buf.slice(0, actual)
  }

  alert(buf);*/

  /*var bbuf = new Uint8Array(32);
  var salt = window.crypto.getRandomValues(bbuf).toString('base64');*/
  //var buf = Buffer.from(bbuf);


  /*console.log(web3.eth.accounts);
  web3.eth.getAccounts(function(err, accounts){
    if (err != null) {
      console.log(err)
    }
    else if (accounts.length === 0) {
      console.log('MetaMask is locked')
    }
    else {
      console.log('MetaMask is unlocked')
      account = web3.eth.accounts;

      console.log(account);
    }
  });*/
}


  function sendEth() {
      console.log(web3);
        var fromAddr = document.getElementById('sendFrom').value;
        var toAddr = document.getElementById('sendTo').value;
        var valueEth = document.getElementById('sendValueAmount').value;
        var value = parseFloat(valueEth) * 1.0e18;
        var gasPrice = 18000000000;
        var gas = 50000;

        web3.eth.sendTransaction({
          from: fromAddr,
          to: toAddr,
          value: value,
          gasPrice: gasPrice,
          gas: gas
        }, function (err, txhash) {
          console.log('error: ' + err);
          console.log('txhash: ' + txhash);
        });
  }
  /*setTimeout(function() {
    if (window.ethereum) {
      web3Provider = window.ethereum;
      try {

      } catch (error) {

        console.error("User denied account access")
      }
    }

    else if (window.web3) {
      web3Provider = window.web3.currentProvider;
    }

    else {
      web3Provider = new Web3.providers.HttpProvider('http://localhost:7545');
    }
    web3 = new Web3(web3Provider);
    
    web3.eth.net.getNetworkType().then(console.log);
    
    //Error: The MetaMask Web3 object does not support synchronous methods like eth_sign without a callback parameter
      //console.log(web3.eth.sign("mydata",account));
      //web3.eth.sign("Hello world", account).then(console.log);

      contract.methods.totalSupply().call((err, result) => { console.log(result) })
      contract.methods.name().call((err, result) => { console.log(result) })
      contract.methods.symbol().call((err, result) => { console.log(result) })
      contract.methods.balanceOf('0xd26114cd6EE289AccF82350c8d8487fedB8A0C07').call((err, result) => { console.log(result) });

    var createWallet = web3.eth.accounts.wallet.create(1 ,'54674321§3456764321§345674321§3453647544±±±§±±±!!!43534534534534');
    console.log(createWallet);
    //$("#response-div").find("p").removeClass("info").addClass(createWallet[0].address);
    $("#response-div").find("p").attr('id', createWallet[0].address);
  }, 5000);*/
  
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