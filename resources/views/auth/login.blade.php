@extends('layouts.front')

@section('content')

<v-container class="fill-height" fluid>
    <v-row align="center" justify="center">
        <v-col cols="12" sm="8" md="4">
            <login-form />
        </v-col>
    </v-row>
</v-container>
@endsection
