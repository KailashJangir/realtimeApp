<template>
	<div class="text-xs-center">
    <v-menu offset-y>
        <template v-slot:activator="{ on, attrs }">
        <v-btn 
         v-bind="attrs"
          v-on="on"
          :color="color">
          alert {{unreadCount}}
        </v-btn>
        
      </template>
		<v-list>
			<v-list-item v-for="item in unread" :key="item.id">
				<router-link :to="item.path">
					<v-list-item-title @click="readIt(item)">{{item.question}}
					</v-list-item-title>
				</router-link>
			</v-list-item>
			<v-divider></v-divider>
			<v-list-item v-for="item in read" :key="item.id">
					<v-list-item-title>{{item.question}}
					</v-list-item-title>
			</v-list-item>

		</v-list>
	</v-menu>
	</div>
	
</template>

<script>
	export default  {
		data(){
			return {
				read : {},
				unread : {},
				unreadCount : 0,
				sound : "https://audio-previews.elements.envatousercontent.com/files/157617930/preview.mp3?response-content-disposition=attachment%3B+filename%3D%228KR4YVH-notification-2.mp3%22"
			}
		},
		created(){
			if(User.loggedIn()){
				this.getNotification()
			}
			Echo.private('App.User.' + User.id())
			    .notification((notification) => {
			    	this.playSound()
			        this.unread.unshift(notification)
			        this.unreadCount++
			    });
		},
		computed:{
			color(){
				this.unreadCount > 0 ? 'red' : 'red lighten-4'
			}
		},
		methods:{

			playSound(){
				let alert = new Audio(this.sound)
				alert.play()
			},
			getNotification(){
				axios.post('/api/notifications')
				.then(res => {
					this.read = res.data.read
					this.unread = res.data.unread
					this.unreadCount = res.data.unread.length 
				})
			},
			readIt(notification)
			{
				axios.post('/api/markAsRead', {id:notification.id})
				.then(res => {
					this.unread.splice(notification,1)
					this.unread.push(notification)
					this.unreadCount-- 
				})
			}
		}
	}
</script>