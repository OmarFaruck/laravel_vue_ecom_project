<template >
<div class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>E. </b>COM.</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit.prevent="submit"> 
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" v-model="form.password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <div class="text-center align-items-center">
        <p>----OR----</p>
      </div>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="/auth/github" class="btn btn-block btn-primary">
          <i class="fab fa-github mr-2"></i> Sign in using github
        </a>
        <a href="/auth/google" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      
        <a href="/auth/facebook" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <!-- <Link href="/" class="text-center">Register a new membership</Link> -->
        <Link href="/register" class="text-center">Register a new membership</Link>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>
 
</template>

<script setup lang="js">
import { Link, useForm, usePage,router } from '@inertiajs/vue3';
import { createToaster } from "@meforma/vue-toaster";

const form = useForm({
    email: '',
    password: ''
});
const toaster = createToaster();
const page =usePage()

function submit() {
    if (!form.email) {
        toaster.error("Email Required");
    } else if (!form.password) {
        toaster.error("Password Required");
    } else {
        form.post("/login", {
            onSuccess: () => {
                if (page.props.flash.status) {
                    router.get("/admin/dashboard"); 
                    // router.get("AdminPage");
                } else {
                    toaster.error(page.props.flash.message);
                }
            }
        });
    }
}
</script>