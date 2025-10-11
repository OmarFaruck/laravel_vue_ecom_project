<template>

<div class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>E. </b>COM.</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form @submit.prevent="submit">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
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
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="retype_password" v-model="form.retype_password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="text-center align-items-center">
        <p>----OR----</p>
      </div>
      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <Link href="login" class="text-center">I already have a membership</Link>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</div>
</template>

<script setup lang="js">
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { createToaster } from "@meforma/vue-toaster";

const form = useForm({name:'' , email:'' ,password:'' , retype_password:''})
const toaster = createToaster();
const page =usePage()

function submit() {
        if(form.email.length===0){
        toaster.error("Name Required")
    }
    else if(form.name.length===0) {
        toaster.error("Email Required")
    }
    else if(form.password.length===0) {
        toaster.error("Password Required")
    }else {
        form.post("/admin/register",{
            onSuccess:()=>{
                if(page.props.flash.status===true){
                    // router.get("/admin/login")
                    router.get("/login")
                }
                else {                    
                    toaster.error(page.props.flash.message)
                }
            }
        })
    }
}
</script>