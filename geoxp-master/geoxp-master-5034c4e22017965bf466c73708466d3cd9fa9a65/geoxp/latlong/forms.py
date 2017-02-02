# coding:utf-8
from django import forms
from django.utils.translation import ugettext_lazy as _
from django.contrib.auth.models import User


class UploadFileForm(forms.Form):
    ''' Represents an upload file form to receive the .csv file as input '''
    attrs = {
        'class': 'button',
    }

    file = forms.FileField(label='', widget=forms.FileInput(attrs=attrs))


class LoginForm(forms.Form):
    ''' Represents a login form that receives user login info '''
    username = forms.CharField(label='Usuário', max_length=50)
    password = forms.CharField(
        widget=forms.PasswordInput, label='Senha', max_length=20)


class RegistrationForm(forms.Form):
    ''' Represents a registration form that will receive user sign up info '''
    email = forms.EmailField(widget=forms.TextInput(
        attrs=dict(required=True, max_length=30)), label=_("E-mail:"))
    username = forms.RegexField(regex=r'^\w+$', widget=forms.TextInput(attrs=dict(required=True, max_length=50)), label=_(
        u"Usuário:"), error_messages={'invalid': _("Este campo aceita apenas letras, números e underline.")})
    password1 = forms.CharField(widget=forms.PasswordInput(
        attrs=dict(required=True, max_length=20, render_value=False)), label=_("Senha:"))
    password2 = forms.CharField(widget=forms.PasswordInput(
        attrs=dict(required=True, max_length=20, render_value=False)), label=_("Confirmar senha:"))

    def clean_username(self):
        ''' Checks if username already exists in database '''
        try:
            user = User.objects.get(
                username__iexact=self.cleaned_data['username'])
        except User.DoesNotExist:
            return self.cleaned_data['username']

        raise forms.ValidationError(
            _(u'Usuário já existe'))

    def clean(self):
        ''' Compares the password inputs and returns an error if they
        do not match '''
        if 'password1' in self.cleaned_data and 'password2' in self.cleaned_data:
            if self.cleaned_data['password1'] != self.cleaned_data['password2']:
                raise forms.ValidationError(
                    _(u'As duas senhas não são iguais.'))
            return self.cleaned_data
