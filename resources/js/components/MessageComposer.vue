<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Message..."></textarea>
    </div>
</template>

<script>
export default {
    data(){
        return {
            message:'',
        };
    },
    methods:{
        send(e){
            e.preventDefault();
            if(this.message==''){
                return;
            }

            this.$emit('send', this.message);
            this.message='';
        }
    }
}
</script>

<style scoped>
     .composer textarea{
         width:96%;
         margin:0.7rem;
         resize: none;
         border-radius: 0.2rem;
         border:0.1rem solid #ccc;
         padding: 0.4rem;
     }
</style>