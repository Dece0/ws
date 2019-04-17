import format from "date-fns";

export const datasetMixin = {
    props: [
        'dataset',
        'graph_name',
        'csrf_token'
    ],

    data: function() {
        return  {
            now_component:'chartjs-line',
            labels: [],
            data: [],
            messageToggle: false,
            message: [],
            options: {
                scales: {
                    yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: this.graph_name
                    }
                    }],
                    xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Time'
                    }
                    }]
                }
            },
            currentDate: new Date().toISOString().split("T"),
        }
    },

    created() {
        this.data = [];
        this.labels = [];

        this.dataset.forEach(item => {
            let dateFromDataset = item.time.split(" ");
            
            if( dateFromDataset[0] === this.currentDate[0] ) {
                this.data.push(item.value);
                this.labels.push(dateFromDataset[1]);
            }
        });

        if ((this.data.length === 0 ) && (this.labels.length === 0)) {
            this.addMessage(`Warning, no data to display in ${ new Date().toDateString() } !`);
        } else {
            this.buttonDateOne = this.currentDate[0];
            this.buttonDateTwo = this.currentDate[0];
            this.dateFrom = this.buttonDateOne;
            this.dateTo = this.buttonDateTwo;
        }
    },

    watch:{
        labels(val){
            if(this.labels.length !== 0 && this.buttonDateOne !== this.currentDate[0] && this.buttonDateTwo !== this.currentDate[0]) 
                this.addMessage(`Success, graph rendered data from ${ this.formatDate(this.buttonDateOne, "msg") } to ${ this.formatDate(this.buttonDateTwo, "msg") }!`);
            if(this.labels.length !== 0 && this.buttonDateOne === this.currentDate[0] && this.buttonDateTwo === this.currentDate[0]) 
                this.addMessage(`Success, graph rendered today's data.`);   
        },
        message(val){
            if(this.message.length>2)
                this.message.splice(0, 1);
        }
    },

    computed:{
        isNowComponent(component){
            if(this.now_component == component){
                return true;
            }
            else {
                return false;
            }
        },
    },

    methods:{
        changeComponent(component){
            this.now_component = component;
        },
        formatDate(value, type) {
            if(type.includes("msg")) return format.format(value, 'D MMM');
            
            if(type.includes("label")) return format.format(value, 'D MMM HH:mm');

            if(type.includes("singleLabel")) return format.format(value, 'HH:mm');
        },
        showData(){
            if(!this.buttonDateOne || !this.buttonDateTwo) {
                this.addMessage(`Error, you selected bad range!`);
                return;
            }

            this.data = [];
            this.labels = [];           
            let to = new Date(this.buttonDateTwo);

            for (let from = new Date(this.buttonDateOne); from <= to; from.setDate(from.getDate() + 1)) {
                let dateFromRange = from.toISOString().split("T");

                this.dataset.forEach(item => {
                    let dateFromDataset = item.time.split(" ");

                    if( dateFromDataset[0] === dateFromRange[0] ) {
                        this.data.push(item.value);

                        if (this.buttonDateOne === this.buttonDateTwo) 
                            this.labels.push(this.formatDate(new Date(item.time), "singleLabel"));
                        else
                            this.labels.push(this.formatDate(new Date(item.time), "label"));
                    }
                });
            }
            
            if ((this.data.length === 0 ) && (this.labels.length === 0)) {
                this.addMessage(`Warning, no data to display from ${ this.formatDate(this.buttonDateOne, "msg") } to ${ this.formatDate(this.buttonDateTwo, "msg") }!`);
            } else {
                this.dateFrom = this.buttonDateOne;
                this.dateTo = this.buttonDateTwo;
            }
        },

        addMessage(message){
            if(!this.messageToggle)
                this.message.push(message);
        },

        cleanMessage(){
            this.message=[];
        },

        messageClass(val){
            if(val.includes("Warning"))
                return 'warning';
            if(val.includes("Error"))
                return 'error';
            if(val.includes("Success"))
                return 'success';
        },

        showMessage(){
            this.messageToggle = !this.messageToggle;
        },
        
        checkMessage(){
            if (!this.messageToggle) return "ON";
            else return "OFF";
        }
    },
}