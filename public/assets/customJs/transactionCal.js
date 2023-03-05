//for get receiver data
let senderOp=document.getElementById('sender');
//reselect for validation


if (senderOp.value) {
    getReceiver(senderOp);
}


function getReceiver(sender) {
    let sender_id=sender.value;
    let x = document.getElementById("receiver");
    clearOption(x);
    createDefaultOption(x,'Loading....')
    axios.post('/transaction/get/receiver', {
        id:sender_id
    })
    .then(function (response) {
        if(response.data.message=='success'){
            console.log('helo');
            let receivers=response.data.receiver;
            clearOption(x);
            if(receivers.length>0){
                clearOption(x);
                createDefaultOption(x,'');
                receivers.forEach(r => {
                    let receiverOption = document.createElement("option");
                    receiverOption.text = r.name+`-(${r.phone})`;
                    receiverOption.value=r.id;
                    x.add(receiverOption);
                });
                let receiverOP = document.getElementById('receiver');
                let oldReceiver = document.getElementById("oldReceiver");
                if(oldReceiver.value){
                    receiverOP.value=oldReceiver.value;
                }
                return;
            }else{
                clearOption(x);
                createDefaultOption(x,'');
                createDefaultOption(x,'No data found in contact');
            }
            return;
        }else{
            alert('Network error or Somthing Wrong');
        }

    })
    .catch(function (error) {
        console.log(error);
    });
}

//for create disable option
function createDefaultOption(element,message) {
        var option = document.createElement("option");
        option.text = message;
        element.add(option);
        option.disabled=true;
}
//for clear option
function clearOption(element){
    element.forEach(o => o.remove());
}

//for exchange rate calculation
function calExRate() {
    let transferRate,receiveRate;
    let tx_currency=document.getElementById('transfer_currency').value;
    let rx_currency=document.getElementById('receive_currency').value;
    if(tx_currency && rx_currency){

        axios.post('/transaction/get/currency', {
            id:rx_currency
        })
        .then(function (response) {
            if (response.data.status=="success") {
                let rate=Number(response.data.data[0].rate);
                let ExInput=document.getElementById('exchangeRate');
                receiveRate=rate;

                axios.post('/transaction/get/currency', {
                    id:tx_currency
                })
                .then(function (response) {
                    if (response.data.status=="success") {
                        let rate=Number(response.data.data[0].rate)
                        transferRate=rate;
                    }
                    ExInput.value=(receiveRate/transferRate).toFixed(6);
                    let rx_amount=document.getElementById('rx_amount').value;
                    let tx_amount=document.getElementById('transfer_amount');
                    if (tx_amount.value) {
                        receiveAmountCal();
                    }else if(rx_amount){
                        transferAmountCal();
                    }
                    totalAmoutCal();
                })

            }
        })

    }

}


// input event function

function receiveAmtInput() {
    transferAmountCal();
    totalAmoutCal();
}
function transferAmtInput(){
    receiveAmountCal();
    totalAmoutCal();
    changeAmountCal();
}

function paidAmtInput() {
    changeAmountCal();
}

function serviceFeeInput() {
    totalAmoutCal();
    changeAmountCal();
}



//functions that use in input change event

// function checkCurrency() {
//     let tx_cur=document.querySelector('#transfer_currency').value;
//     let rx_cur=document.querySelector('#receive_currency').value;
//     let ex_rate=document.getElementById('exchangeRate');
//     if(tx_cur==rx_cur){
//         console.log('same');

//        return ex_rate.value=1;
//     }
// }

function getExchangeRate() {
    return document.getElementById('exchangeRate').value
}
function exChange() {
    receiveAmountCal();
}

function transferAmountCal() {
    let tx_amount=document.getElementById('transfer_amount');
    let exRateValue=getExchangeRate();
    let rx_amount=document.getElementById('rx_amount').value;
    if (rx_amount!='' && exRateValue!='') {
        let transferAmount=rx_amount/exRateValue;
        tx_amount.value=transferAmount.toFixed(2)

    }
    if(rx_amount==''){
        tx_amount.value=0;
    }
    changeAmountCal();

}
function receiveAmountCal(){
    let tx_amount=document.getElementById('transfer_amount').value;
    let exRateValue=getExchangeRate();
    let rx_amount=document.getElementById('rx_amount');
    if(tx_amount!='' && exRateValue!=''){
        rx_amount.value=(tx_amount*exRateValue).toFixed(2);

    }
    if(exRateValue=='' || tx_amount==''){
        rx_amount.value=0;
    }
    changeAmountCal();
}

function changeAmountCal(){
    let paid_amount=document.getElementById('paid_amount').value;
    let transfer_amount=Number(document.getElementById('transfer_amount').value);
    let service_fee=Number(document.getElementById('service_fee').value);
    let change_amount=document.getElementById('change_amount');

    if(paid_amount!='' && transfer_amount!='' && service_fee!='')
    {
        let totalChange=paid_amount-(transfer_amount+service_fee);
        if(totalChange>=0){
            change_amount.value=totalChange.toFixed(2);
        }else{
            change_amount.value=0;
        }
    }
    if( paid_amount==''){
        change_amount.value=0;
    }

}

function totalAmoutCal(){
    let total=document.getElementById('total_amount');
    let service_fee=document.getElementById('service_fee');
    let tx_amount=document.getElementById('transfer_amount');
    if(service_fee.value!='' || tx_amount.value!=''){
        total.value=(Number(service_fee.value)+Number(tx_amount.value)).toFixed(2);
    }else{
        total.value='';
    }
}






