<template>
    <div class="conversation">
        <h4>{{contact?contact.name:'Select a Contact'}}</h4>
        <app-messages-feed :contact="contact" :messages="messages"></app-messages-feed>
        <app-message-composer @send="sendMessage"></app-message-composer>
    </div>
</template>

<script>
import MessagesFeed from './MessagesFeed';
import MessageComposer from './MessageComposer';

export default {
    props:{ 
        contact:{
            type:Object,
            default:null
        },
        messages:{
            type:Array,
            default:[]
        }
    },

    components:{
        appMessagesFeed:MessagesFeed,
        appMessageComposer:MessageComposer
    },

    methods:{
        sendMessage(text){
            if(!this.contact){
                return;
            }
            axios.post('/conversation/send',{
                contact_id:this.contact.id,
                text:text
            })
            .then((res)=>{
                this.$emit('new', res.data);
            });
        }
    }
    
}
</script>

<style scoped>
    .conversation{
        flex:5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    h4{
        padding: 0.7rem;
        margin:0;
        border-bottom: 0.1rem dashed #eee;
    }
</style>