<template>
	<div>
		{{ user }}
	</div>
</template>
<script>
	export default {
		data(){
			return {
				user : localStorage.getItem('token')
			}
		},
		methods: {
			
		},

		created(){

			console.log(localStorage.getItem('token'));
		},
	}
</script>