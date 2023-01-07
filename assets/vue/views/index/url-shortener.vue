<template>
  <div class="form-inline shorten-form" >
    <h1 class="h3 mb-3 font-weight-normal">Shorten URL</h1>

    <div class="input-group">
      <input type="text" class="form-control" placeholder="URL" v-model="url"/>
      <button type="button" class="btn btn-primary" @click="shortenUrl">Shorten</button>
    </div>

    <div class="response mt-2" v-if="shortenedUrl">
      <a :href="shortenedUrl" target="_blank">{{shortenedUrl}}</a>
    </div>
  </div>
</template>


<script setup>
import {ref} from "vue";

const url = ref('')
const shortenedUrl = ref(null);

function shortenUrl() {
  fetchApi(url)
      .then(x => shortenedUrl.value = x.shortUrl);
}

async function fetchApi(url) {
  let response = await fetch('/api/create', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8'
    },
    body: JSON.stringify({
      'url': url.value
  })
  });

  return response.json();
}
</script>

<style>
html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.shorten-form {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}

.shorten-form .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.shorten-form .form-control:focus {
  z-index: 2;
}

</style>
