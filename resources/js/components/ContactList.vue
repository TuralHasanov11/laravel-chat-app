<template>
    <div class="contact-list">
        <ul v-if="contacts.length>0">
            <li v-for="(contact,index) in sortedContacts" :key="index" 
                @click="selectContact(contact)"
                :class="{'selected':contact==selected}"
            >
                <div class="avatar">
                    <img :src="contact.profile_image" alt="">
                </div>
                <div class="contact">
                    <div class="contact-name">{{contact.name}}</div>
                    <div class="contact-email">{{contact.email}}</div>
                </div>
                <span class="unread" v-if="contact.unread">{{contact.unread}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props:{
        contacts:{
            type:Array,
            default:[]
        },
    },
    data(){
        return {
            selected:this.contacts.length?this.contacts[0]:null
        }
    },
    methods:{
        selectContact(contact){
            this.selected=contact;
            this.$emit('selected', contact)
        }
    },

    computed:{
        sortedContacts(){
            return _.sortBy(this.contacts, [(contact)=>{
                if(contact == this.selected){
                    return Infinity;
                }
                
                return contact.unread;
            }]).reverse();
        }
    }
}
</script>

<style scoped>
    .contact-list{
        flex:2;
        max-height: 600px;
        overflow: scroll;
        border-left:0.1rem solid #ddd;
    }

    ul{
        list-style-type: none;
        padding-left:0;
    }

    ul li {
        display:flex;
        padding:0.2rem;
        border-bottom:  0.1rem solid #ddd;
        height:5rem;
        position: relative;
        cursor: pointer;
    }

    ul li.selected {
        background: #eee;
    }


    li .avatar{
        flex:1;
        display:flex;
        align-items: center;
    }

    li .avatar img{
        width:2rem;
        border-radius: 50%;
        margin:0 auto;
    }

    li .contact{
        flex:3;
        font-size:0.6rem;
        overflow:hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    li .contact p{
       margin:0;
    }

    li .contact .contact-name{
       font-weight: bold;
    }

     li span.unread{
       background: lightseagreen;
       color: #fff;
       position: absolute;
       right: 0.7rem;
        top:1.25rem;
        display:flex;
        font-weight: 700;
        min-width: 1.25rem;
        justify-content: center;
        align-items: center;
        line-height: 1.25rem;
        font-size: 0.8rem;
        padding: 0 0.25rem;
        border-radius: 0.2rem;
    }

</style>