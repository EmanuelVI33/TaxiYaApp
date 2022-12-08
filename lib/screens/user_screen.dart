import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:taxi_ya/providers/providers.dart';

class UserScreen extends StatelessWidget {
  const UserScreen({super.key});

  @override
  Widget build(BuildContext context) {
    final userProvider = Provider.of<UserProvider>(context, listen: false);

    return userProvider.loading
        ? const CircularProgressIndicator()
        : Center(
            child: Column(
              children: [
                
                
                Image.asset("assets/no-image.png",width: 200, height: 200) , 
                Text(userProvider.nombre+' '+ userProvider.apellido,style: TextStyle(
                  fontSize: 30, fontWeight: FontWeight.bold, 
                ),),
                const SizedBox(
                  height: 10,

                ),

                
                Text(userProvider.email, style: TextStyle(
                  fontSize: 20
                )),
                const SizedBox(
                  height: 10,
                ),
                // userProvider.image == ''
                //     ? Image.asset('no-image.png')
                //     : Image.network(
                //         userProvider.image,
                //         fit: BoxFit.cover,
                //       ),

                MaterialButton(
                minWidth: 200.0,
                height: 40.0,
                onPressed: () {},
                color: Colors.lightBlue,
                shape: new RoundedRectangleBorder(borderRadius: new BorderRadius.circular(30.0)),
                child: Text('Actualizar Datos', style: TextStyle(color: Colors.white)),
              )
              ],
            ),
          );
  }
}
