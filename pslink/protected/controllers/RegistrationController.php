<?php

Yii::import('application.modules.registration.controllers.YumRegistrationController');
class RegistrationController extends YumRegistrationController 
{
	public function actionRegistration() 
	{
        Yii::import('application.modules.profile.models.*');
        $profile = new YumProfile;
 
        if (isset($_POST['Profile'])) 
		{ 
            $profile->attributes = $_POST['YumProfile'];
 
            if($profile->save())
                $user = new YumUser;
                $password = YumUser::generatePassword();
				// we generate a dummy username here, since yum requires one
                $user->register(md5($profile->email), $password, $profile);
 
                $this->sendRegistrationEmail($user, $password);
                Yum::setFlash('Thank you for your registration. Please check your email.');
                $this->redirect(Yum::module()->loginUrl);
            }
 
        $this->render('registration', array(
                    'profile' => $profile,
                    )
                );  
    }
}
