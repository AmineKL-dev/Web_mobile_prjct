import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.tooling.preview.Preview

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            BusinessCardApp()
        }
    }
}

@Composable
fun BusinessCardApp() {
    Surface(
        modifier = Modifier.fillMaxSize(),
        color = Color(0xFFEFEFEF) // couleur de fond
    ) {
        Column(
            modifier = Modifier
                .fillMaxSize()
                .padding(16.dp),
            verticalArrangement = Arrangement.Center,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            LogoNameTitle()
            Spacer(modifier = Modifier.height(32.dp))
            ContactInfo()
        }
    }
}

@Composable
fun LogoNameTitle() {
    Column(horizontalAlignment = Alignment.CenterHorizontally) {
        Surface(
            shape = RoundedCornerShape(16.dp),
            color = Color.Gray,
            modifier = Modifier.size(150.dp)
        ) {
           // logo
        }

        Spacer(modifier = Modifier.height(8.dp))

        Text(
            text = "Amine Koula",
            fontSize = 20.sp,
            fontWeight = FontWeight.Bold
        )
        Text(
            text = "Software and Data Engineer",
            fontSize = 14.sp,
            color = Color.Gray
        )
    }
}

@Composable
fun ContactInfo() {
    Column(
        horizontalAlignment = Alignment.Start,
        verticalArrangement = Arrangement.spacedBy(12.dp)
    ) {
        ContactRow(iconResId = android.R.drawable.ic_menu_call, contactText = "+212 6758656")
        ContactRow(iconResId = android.R.drawable.ic_menu_share, contactText = "Amine Koula")
        ContactRow(iconResId = android.R.drawable.ic_dialog_email, contactText = "amine@gmail.com")
    }
}

@Composable
fun ContactRow(iconResId: Int, contactText: String) {
    Row(
        verticalAlignment = Alignment.CenterVertically
    ) {
        Icon(
            painter = painterResource(id = iconResId),
            contentDescription = null,
            tint = Color(0xFF3ddc84),
            modifier = Modifier.size(24.dp)
        )
        Spacer(modifier = Modifier.width(12.dp))
        Text(text = contactText, fontSize = 14.sp)
    }
}
@Preview(showBackground = true)
@Composable
fun BusinessCardPreview() {
    BusinessCardApp()
}